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
            require>
          <input type="password" name="memPsw" maxlength="12" placeholder="密碼" v-model="memPsw" @input="errorMsg = ''"
            require>
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
      modify: {
        psw: '',
        newPsw: '',
      },
      error: null,
      memberData: {},
      matchedUser: null,
    }
  },
  computed: {
    ...mapState(["isLoginOpen", "forgotPsw", 'login', 'member', 'keepLoginStatus', 'userTokenKey'])

  },
  methods: {
    ...mapMutations(["toggleLogin", "toggleForgotPsw", 'toggleRegister', 'setInfo', 'loginOk', 'keepLoginOn', 'toggleLoginStatus', 'setToStorage'])
    ,
    closeLogin() {
      this.toggleLogin();
      this.reset();
    },
    closeForgot() {
      this.toggleForgotPsw();
    },
    checkLogin() {

      this.matchedUser = this.memberData.find(user => user.email === this.memId && user.password === this.memPsw);

      //找的到會員帳號&密碼
      if (this.matchedUser) {
        this.setInfo(this.matchedUser);
        this.loginOk(true);
        if (this.keepLoginStatus) {
          this.setToStorage();
        }
        return;
      }
      //如果帳號密碼空值
      if (!this.memId && !this.memPsw) {
        this.matchedUser = null;
        this.errorMsg = '請輸入帳號或密碼';
        return;
      }else{
        this.errorMsg = '帳號或密碼錯誤'
        return;
      }
    },

    reset() {
      this.memId = this.memPsw = this.errorMsg = '';
    },
    checkEmail() {
      if (!this.memEmail) {
        return alert("輸入錯誤或無輸入");
      } else {
        this.step = 2;
        this.memEmail = '';
      }
    },
    validCheck() {
      if (!this.number1 || !this.number2 || !this.number3 || !this.number4) {
        alert("請輸入驗證碼");
      } else {
        this.number1 = this.number2 = this.number3 = this.number4 = '';
        this.step = 3;
      }
    },
    modifyCheck() {
      if (!this.modify.psw || !this.modify.newPsw) {
        alert("請輸入密碼");
        return;
      }
      else if ((this.modify.psw === this.modify.newPsw && this.modify.psw.length >= 6 && this.modify.psw.length <= 12)) {
        this.step = 4;
        this.modify.psw = this.modify.newPsw = '';
        return;
      } else {
        alert("請輸入密碼");
      }
      this.modify.psw = '';
      this.modify.newPsw = '';
    },
    modifySuccess() {
      this.forgetPsw = false;
      this.step = 0;
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
    async fetchMemberData() {
      try {
        const response = await axios.get("data/member.json");
        this.memberData = response.data;

        // 抓到資料後執行tokenCheck()比對localstorage裡的資料
        this.tokenCheck();
      } catch (error) {
        console.error(error);
      }
    },
    onMounted() {
      const auth = useFirebaseAuth();
      getRedirectResult(auth)
        .then((Response) => {
          console.log(Response);
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




