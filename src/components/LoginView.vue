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
        <form @click.prevent="checkLogin">

          <input class="login_memid" type="text" name="memId" placeholder="信箱" v-model="memId" @input="errorMsg = ''"
            require>
          <input type="password" name="memPsw" maxlength="12" placeholder="密碼" v-model="memPsw" @input="errorMsg = ''"
            require>
          <div class="error_message">{{ errorMsg }}</div>
          <div class="login_keep">
            <div class="login_keep_status">
              <input type="checkbox" name="check" id="check">
              <label for="check">保持登入狀態</label>
            </div>
            <div class="forget_psw" @click="closeForgot">忘記密碼?</div>
          </div>
          <button class="login_form_submit">登入</button>
          <button @click.prevent="toggleRegister(false)" class="login_form_register" type="submit">註冊會員</button>
          <span>OR</span>
        </form>
        <button class="login_connect">
          <i class="fa-brands fa-square-facebook"></i>
          以FACEBOOK帳號登入
        </button>

        <button class="login_connect" @click="signInRedirect">
          <i class="fa-brands fa-google"></i>
          以GOOGLE帳號登入
        </button>
        <button class="login_connect">
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
      loginStatus: false,
      isRegistered: false,
      forgetPsw: false,
      step: 0,
      errorMsg: '',
      verification: {
        number1: '',
        number2: '',
        number3: '',
        number4: '',
      },
      memEmail: '',
      modify: {
        psw: '',
        newPsw: '',
      },
      error: null,
      memberData: {}
    }
  },
  computed: {
    ...mapState(["isLoginOpen", "forgotPsw", 'login'])
  },
  methods: {
    ...mapMutations(["toggleLogin", "toggleForgotPsw", 'toggleRegister', 'setInfo', 'loginToggle'])
    ,
    closeLogin() {
      this.toggleLogin();
      this.reset();
    },
    closeForgot() {
      this.toggleForgotPsw();
    },
    checkLogin() {
    
      const matchedUser = this.memberData.find(user => user.email === this.memId && user.password === this.memPsw);
      
      if (matchedUser) {
        this.loginToggle(true);
        this.setInfo(matchedUser);
        this.reset();
        return;
      } else {
        this.errorMsg = '請輸入帳號或密碼';
        return;
      }
      
      
    },
    reset() {
      this.memId = this.memPsw = '';
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
    fetchMemberData() {
      axios
        .get("data/member.json")
        .then((res) => {
          this.memberData = res.data;
        })
        .catch((err) => {
          console.log(err);
        });

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
  },


  mounted() {
    this.onMounted();
    this.fetchMemberData();
  },
}


</script>




