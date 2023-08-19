<template>
  <section v-show="forgotPsw && step === 0">
    <div class="container">
      <form ref="form">
        <div class="forget_password">
          <img :src="require('@/assets/images/login/cross.png')" class="forget_close_modal" @click="closeLogin">
          <h2>忘記密碼</h2>
          <p>請輸入您的註冊信箱，進行密碼變更</p>
          <div class="forget_password_enter">
            <label for="">請輸入您的信箱</label>
            <input type="email" placeholder="信箱" v-model="email" required="required" name="email">
          </div>
          <input type="submit" value="下一步" class="forget_password_submit" @click.prevent="checkEmail">
        </div>
      </form>
    </div>
  </section>

  <section v-show="forgotPsw && step === 1">
    <div class="container">
      <div class="enter_valid">
        <img :src="require('@/assets/images/login/cross.png')" class="forget_close_modal" @click="closeLogin">
        <h2>輸入驗證碼</h2>
        <p>已發送驗證碼至{{ memEmail }}</p>
        <div class="enter_valid_input">
          <input type="text" required="required" v-model="verification.number1" max-length="1"
            @input="handleSingleDigitInput($event, 'verification', 'number1')">
          <input type="text" required="required" v-model="verification.number2" max-length="1"
            @input="handleSingleDigitInput($event, 'verification', 'number2')">
          <input type="text" required="required" v-model="verification.number3" max-length="1"
            @input="handleSingleDigitInput($event, 'verification', 'number3')">
          <input type="text" required="required" v-model="verification.number4" max-length="1"
            @input="handleSingleDigitInput($event, 'verification', 'number4')">
        </div>
        <div class="enter_valid_re">
          <p>10 分鐘內若未收到驗證碼</p>
          <p>請<a @click="resendOrSendEmail">按此</a>重新發送</p>
        </div>
        <input @click="validCheck" type="submit" value="送出" class="enter_valid_submit">
      </div>
    </div>
  </section>

  <section v-show="forgotPsw && step === 2">
    <div class="container">
      <div class="enter_modify">
        <img :src="require('@/assets/images/login/cross.png')" class="modify_close_modal" @click="closeLogin">
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
        <img :src="require('@/assets/images/login/cross.png')" class="modify_close_success_modal" @click="closeLogin">
        <img :src="require('@/assets/images/footerLogo.png')" alt="" class="enter_modify_success_logo">
        <p>修改完成！</p>
        <p>請重新登入</p>
        <button @click="closeLogin">返回會員登入</button>
      </div>
    </div>
  </section>
</template>
<script >
import emailjs from 'emailjs-com';
import { mapMutations, mapActions, mapGetters, mapState } from "vuex";
import axios from "axios";
// import { firebaseAuth } from "@/firebase.js";
// import {
//   sendPasswordResetEmail,
//   sendEmailVerification,
// } from "firebase/auth";
// //google 守門人
// import { signInWithPopup, GoogleAuthProvider, getAdditionalUserInfo  } from "firebase/auth";
// const provider = new GoogleAuthProvider();
// // 檢查使用者的登錄狀態
// // import authMixin from "@/assets/js/authMixin.js";
// import axios from "axios";
// import { BASE_URL } from "@/assets/js/common.js";


export default {
  name: 'forgot',
  data() {
    return {
      step: 0,
      email: '',
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
      responseData: [],
      canSend: true,
      cooldown: 600000,
      remainingTime: 0,
      timerInterval: null,
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
    sendEmail() {
      emailjs.sendForm('daka', 'template_2gc59e5', this.$refs.form, 'dTmmmssJvAjvKxo4a')
        .then((result) => {
          console.log('SUCCESS!', result.text);
        }, (error) => {
          console.log('FAILED...', error.text);
        });
    },
    handleSingleDigitInput(event, objName, fieldName) {
      const input = event.target.value;

      // 只允許單個數字
      if (input.length > 1) {
        event.target.value = input[input.length - 1];
      }
      // 更新相關數據
      this[objName][fieldName] = event.target.value;
    },
    closeLogin() {

      this.toggleForgotPsw(false);
      this.toggleLogin(true);
      this.clearInput();
    },
    clearInput() {
      this.email = this.modify.psw = this.modify.newPsw = this.verification.number1 = this.verification.number2 = this.verification.number3 = this.verification.number4 = '';
      this.step = 0;
      this.canSend = false;
      this.cooldown = 600000;
      this.remainingTime = 0;
      this.timerInterval = null;
    },

    validateForm() {
      const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      const isEmailValid = emailRegex.test(this.email);
      return isEmailValid;
    },
    checkEmail() {
      const memEmail = {
        email: this.email,
      };

      axios.post(`${this.$URL}/getMemberMail.php`, JSON.stringify(memEmail))
        .then(response => {
          this.responseData = response.data;
          const emailCheck = this.responseData.email === this.email;

          if (emailCheck) {
            if (this.email && this.validateForm()) {
              this.step = 1;
              this.startCooldown();
              this.sendEmail();
              alert('已發送，請至信箱確認');
            } else {
              alert("輸入錯誤或無輸入");
              this.clearInput();
            }
          } else {
            alert("輸入的 Email 不對");
            this.clearInput();
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
    startCooldown() {
      this.canSend = false;
      this.remainingTime = this.cooldown;

      clearInterval(this.timerInterval); // 清除之前的計時器

      this.timerInterval = setInterval(() => {
        this.remainingTime -= 1000; // 每次減少一秒
        console.log(this.remainingTime);
        if (this.remainingTime <= 0) {
          clearInterval(this.timerInterval);
          this.canSend = true;
        }
      }, 1000);
    },

    resendOrSendEmail() {
      if (this.canSend) {
        this.sendEmail();
        alert('已發送，請至信箱確認');
      } else {
        const minutesLeft = Math.ceil(this.remainingTime / 60000);
        if (minutesLeft >= 10) {
          alert('已經超過10分鐘，可以重新發送');
        } else {
          alert(`請等待 ${minutesLeft} 分鐘後才能再次發送`);
        }
      }
    },

    validatePsw() {
      const passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{6,12}$/;
      const passwordConfirmRegex = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{6,12}$/;
      const isPswValid = passwordRegex.test(this.modify.psw);
      const isPswConfirmValid = passwordConfirmRegex.test(this.modify.newPsw);

      return isPswValid && isPswConfirmValid && (this.modify.psw === this.modify.newPsw);

    },
    modifyCheck() {
      const editMember = {
        mem_id: this.responseData.mem_id,
        password: this.modify.psw,
      };

      if (this.validatePsw() && this.modify.psw !== this.responseData.password) {
        axios.post(`${this.$URL}/editMemberPsw.php`, JSON.stringify(editMember), {
          headers: {
            'Content-Type': 'application/json'
          }
        })
          .then(res => {
            console.log(res);
            if (res.data === 'success') {
              alert('修改成功');
              this.step = 3;
              setTimeout(() => {
                this.clearInput();
                this.toggleForgotPsw(false);
                this.toggleLogin(true);
              }, 3000)
            } else {
              alert('異動失敗');
            }
          })
          .catch(err => {
            console.log(err);
          })

        this.email = this.modify.psw = this.modify.newPsw = this.verification.number1 = this.verification.number2 = this.verification.number3 = this.verification.number4 = '';

        return;
      } else {
        alert("請輸入密碼");
      }
    },
    modifySuccess() {
      this.step = 0;
      this.closeLogin();
    },



  },
  mounted() {

  },
  computed: {
    ...mapState(["isLoginOpen", "forgotPsw"])
  }

}

</script>




