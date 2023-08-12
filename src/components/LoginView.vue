<template>
  <div class="container">

    <section class="login">
      <div class="login_pic">
        <img :src="require('@/assets/images/footerLogo.png')" alt="DAKA-logo">
        <p>
          # 快樂就是這麼簡單
        </p>
      </div>

      <div class="login_form">
        <img :src="require('@/assets/images/login/cross.png')" class="close_modal" @click="closeLogin">
        <form @submit.prevent="checkLogin">

          <input class="login_memid" type="text" name="memId" placeholder="信箱" v-model="memId" @input="errorMsg = ''"
            required>
          <input type="password" name="memPsw" maxlength="12" placeholder="密碼" v-model="memPsw" @input="errorMsg = ''"
            required>
          <div class="error_message">{{ errorMsg }}</div>
          <div class="login_keep">
            <div class="login_keep_status" @click="toggleLoginStatus">
              <input type="checkbox" id="check">
              <label for="check">保持登入狀態</label>
            </div>
            <div class="forget_psw" @click="closeForgot">忘記密碼?</div>
          </div>
          <button class="login_form_submit">登入</button>
          <button @click.prevent="toggleRegister(false)" class="login_form_register" type="submit">註冊會員</button>
          <span>OR</span>
        </form>
        <button class="login_connect" @click="signInRedirect">
          <i class="fa-brands fa-square-facebook"></i>
          以FACEBOOK帳號登入
        </button>

        <button class="login_connect" @click="signInRedirect">
          <i class="fa-brands fa-google"></i>
          以GOOGLE帳號登入
        </button>
        <button class="login_connect" @click="signInRedirect">
          <i class="fa-brands fa-apple"></i>
          以APPLE帳號登入
        </button>
      </div>
    </section>

    <!-- 預約成功彈窗 -->
    <div class="reservation_modal" v-show="modalSwitch">
      <div class="modal">
        <div class="pic">
          <img src="@/assets/images/member/modal.svg" alt="" />
        </div>
        <div class="bind_success">
          <span>登入成功！</span>
          <button @click="loginSuccessPop">確定</button>
        </div>
      </div>
    </div>
  </div>
</template>
<style></style>
<script >

import { mapMutations, mapActions, mapGetters, mapState } from "vuex";
import { ref, onMounted } from 'vue';
import { useFirestore } from 'vuefire'; //import firebase
import { getRedirectResult, signInWithRedirect, signOut } from 'firebase/auth';
import { useCurrentUser, useFirebaseAuth } from 'vuefire';
import { GoogleAuthProvider } from 'firebase/auth';
import axios from "axios";

export default {
  name: 'login',
  data() {
    return {
      memId: '',
      memPsw: '',
      errorMsg: '',
      memEmail: '',
      error: null,
      memberData: {},
      matchedUser: null,
      modalSwitch: false,
    }
  },
  computed: {
    ...mapState(["isLoginOpen", "forgotPsw", 'login', 'member', 'keepLoginStatus', 'userTokenKey'])

  },
  methods: {
    ...mapMutations(["toggleLogin", "toggleForgotPsw", 'toggleRegister', 'setInfo', 'loginOk', 'keepLoginOn', 'toggleLoginStatus', 'setToStorage', 'setRegisterInfo'])
    ,
    closeLogin() {
      this.toggleLogin();
      this.reset();
    },
    closeForgot() {
      this.toggleForgotPsw();
    },
    checkLogin() {
      const loginData = {
        memId: this.memId,
        memPsw: this.memPsw,
        remember_me: this.keepLoginStatus
      };
      
      axios.post(`${this.$URL}/login.php`,  JSON.stringify(loginData), {
  headers: {
    'Content-Type': 'application/json'
  }
})
        .then(response => {
          const responseData = response.data;
          if (responseData.mem_no) {
            // 登录成功逻辑
            console.log(123);
            this.setInfo(responseData);
            this.loginSuccessPop();
            this.loginOk(true);
            if (responseData.remember_me) {
              this.setToStorage();
            }
          } else {
            this.errorMsg = responseData.errorMsg;
          }
        })
        .catch(error => {
          console.log(err);
        });


      // this.matchedUser = this.memberData.find(user => user.email === this.memId && user.password === this.memPsw);

      // //找的到會員帳號&密碼
      // if (this.matchedUser) {
      //   this.setInfo(this.matchedUser);
      //   this.loginOk(true);
      //   if (this.keepLoginStatus) {
      //     this.setToStorage();
      //   }
      //   return;
      // }
      // //如果帳號密碼空值
      // if (!this.memId && !this.memPsw) {
      //   this.matchedUser = null;
      //   this.errorMsg = '請輸入帳號或密碼';
      //   return;
      // } else {
      //   this.errorMsg = '帳號或密碼錯誤'
      //   return;
      // }
    },

    reset() {
      this.memId = this.memPsw = this.errorMsg = '';
    },
    signInRedirect() {
      const auth = useFirebaseAuth(); // 只有在客戶端有效，這行只能存在於前端(client side)
      const googleAuthProvider = new GoogleAuthProvider();

      signInWithRedirect(auth, googleAuthProvider)
        .catch((reason) => {
          console.error('Failed signInRedirect', reason);
          this.error = reason;
        });
    },
    fetchMemberData() {
      axios.get(`${this.$URL}/getMember.php`)
        .then((res) => {
          console.log(res);
          this.memberData = res.data;
        })
        .catch((err) => {
          console.log(err);
        })

      // 抓到資料後執行tokenCheck()比對localstorage裡的資料
      this.tokenCheck();
    },
    loginSuccessPop() {
      this.modalSwitch = !this.modalSwitch;
    },
    onMounted() {
      const auth = useFirebaseAuth();
      getRedirectResult(auth)
        .then((Response) => {

          console.log(Response);
          this.setRegisterInfo(Response);

        })
        .catch((reason) => {
          console.error('Failed redirect result', reason);
          this.error = reason;
        });
    },
    tokenCheck() {
      const checkToken = localStorage.getItem(this.userTokenKey);
      if (checkToken) {
        const user = this.memberData.find(user => user.email === checkToken);
        if (user) {
          this.loginOk(true);
          this.setInfo(user);
        }
      } else {
        return;
      }
    }

  },


  mounted() {
    this.onMounted();
    this.fetchMemberData();
  },
}


</script>




