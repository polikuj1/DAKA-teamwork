<template>
  <section v-show="forgotPsw && step === 0">
    <div class="container">
      <div class="forget_password">
        <img :src="require('@/assets/images/login/cross.png')" class="forget_close_modal" @click="closeLogin(true)">
        <h2>忘記密碼</h2>
        <p>請輸入您的註冊信箱，進行密碼變更</p>
        <div class="forget_password_enter">
          <label for="">請輸入您的信箱</label>
          <input type="email" placeholder="信箱" v-model="memEmail" required="required">
        </div>
        <input @click="checkEmail" type="submit" value="下一步" class="forget_password_submit">
      </div>
    </div>
  </section>

  

  <section v-show="forgotPsw && step === 1">
    <div class="container">
      <div class="enter_valid">
        <img :src="require('@/assets/images/login/cross.png')" class="forget_close_modal" @click="closeLogin(true)">
        <h2>輸入驗證碼</h2>
        <p>已發送驗證碼至sm********@gmail.com</p>
        <div class="enter_valid_input">
          <input type="text" required="required" v-model="number1" max-length="1">
          <input type="text" required="required" v-model="number2" max-length="1">
          <input type="text" required="required" v-model="number3" max-length="1">
          <input type="text" required="required" v-model="number4" max-length="1">
        </div>
        <div class="enter_valid_re">
          <p>10 分鐘內若未收到驗證碼</p>
          <p>請<a href="">按此</a>重新發送</p>
        </div>
        <input @click="validCheck" type="submit" value="送出" class="enter_valid_submit">
      </div>
    </div>
  </section>

  <section v-show="forgotPsw && step === 2">
    <div class="container">
      <div class="enter_modify">
        <img :src="require('@/assets/images/login/cross.png')" class="modify_close_modal" @click="closeLogin(true)">
        <h2>修改密碼</h2>
        <p>請輸入 6 -12 位包含英文及數字的密碼</p>
        <div class="enter_modify_input">
          <label for="modifyPsw">新密碼</label>
          <input type="password" required="required" v-model="modify.psw" maxlength="12" minlength="6" id="modifyPsw">
          <label for="modifyNewPsw">再次輸入新密碼</label>
          <input type="password" required="required" v-model="modify.newPsw" maxlength="12" minlength="6"
            id="modifyNewPsw">
        </div>
        <input @click="modifyCheck" type="submit" value="送出" class="enter_modify_submit">
      </div>
    </div>
  </section>

  <section v-show="forgotPsw && step === 3">
    <div class="container">
      <div class="enter_modify_success">
        <img :src="require('@/assets/images/login/cross.png')" class="modify_close_success_modal"
          @click="closeLogin(true)">
        <img :src="require('@/assets/images/footerLogo.png')" alt="" class="enter_modify_success_logo">
        <p>修改完成！</p>
        <p>請重新登入</p>
        <button @click="backLogin">返回會員登入</button>
      </div>
    </div>
  </section>
</template>
<script >



import { mapMutations, mapActions, mapGetters, mapState } from "vuex";

// import { firebaseAuth } from "@/assets/config/firebase.js";
// import {
//   sendPasswordResetEmail,
//   sendEmailVerification,
// } from "firebase/auth";
// //google 守門人
// import { signInWithPopup, GoogleAuthProvider, getAdditionalUserInfo  } from "firebase/auth";
// const provider = new GoogleAuthProvider();
// // 檢查使用者的登錄狀態
// import authMixin from "@/assets/js/authMixin.js";
// import axios from "axios";
// import { BASE_URL } from "@/assets/js/common.js";


export default {
  name: 'forgot',
  data() {
    return {
      step: 0,
      memEmail: '',
      errorMsg: '',
      modify: {
        psw: '',
        newPsw: '',
      },
      verification: {
        number1: '',
        number2: '',
        number3: '',
        number4: '',
      },
    }
  },
  methods: {
    ...mapMutations(["toggleLogin", "toggleForgotPsw"])
    ,


    // resetPsw() {
    //   sendPasswordResetEmail(firebaseAuth, this.memEmail)
    //     .then(() => {
    //       window.alert("已發送信件至信箱，請按照信件說明重設密碼");
    //       this.step = 4;
    //     })
    //     .catch((error) => {
    //       const errorCode = error.code;
    //       if (errorCode === "auth/invalid-email") {
    //         alert(`信箱格式錯誤${errorCode}`);
    //       } else {
    //         console.log("重置密碼失敗", error.message);
    //         alert(`重置密碼失敗${error}`);
    //       }
    //     });
    // },




    closeLogin(status) {
      this.toggleForgotPsw(status);
      this.clearInput();
    },
    clearInput() {
      this.memEmail = this.modify.psw = this.modify.newPsw = this.verification.number1 = this.verification.number2 = this.verification.number3 = this.verification.number4 = '';
      this.step = 0;
    },
    backLogin() {
      this.toggleForgotPsw(true);
      this.step = 0;
      this.clearInput()
    },
    checkEmail() {
      if (!this.memEmail) {
        return alert("輸入錯誤或無輸入");
      } else {
        this.step = 1;
        this.memEmail = '';
      }


    },
    validCheck() {
      if (!this.number1 || !this.number2 || !this.number3 || !this.number4) {
        alert("請輸入驗證碼");
      } else {
        this.number1 = this.number2 = this.number3 = this.number4 = '';
        this.step = 2;
      }

    },
    modifyCheck() {
      if (!this.modify.psw || !this.modify.newPsw) {
        alert("請輸入密碼");
        return;
      }
      else if ((this.modify.psw === this.modify.newPsw && this.modify.psw.length >= 6 && this.modify.psw.length <= 12)) {
        this.step = 3;
        return;
      } else {
        alert("請輸入密碼");
      }
      this.clearInput();
    },
    modifySuccess() {
      this.step = 0;
      closeLogin(false);
    },



  },
  mounted() {

  },
  computed: {
    ...mapState(["isLoginOpen", "forgotPsw"])
  }

}

</script>




