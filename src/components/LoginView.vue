<template>
  <div class="container" >

    <section class="login" >
      <div class="login_pic">
        <img :src="require('@/assets/images/footerLogo.png')" alt="">
        <p>
          # 快樂就是這麼簡單
        </p>
      </div>

      <div class="login_form">
        <img :src="require('@/assets/images/login/cross.png')" class="close_modal" @click="toggleLogin">
        <form>

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
          <button class="login_form_submit" @click.prevent="checkLogin">登入</button>
          <button @click.prevent="toggleRegister(false)" class="login_form_register">註冊會員</button>
          <span>OR</span>
          

            <button class="login_connect" @click.prevent="">
              <i class="fa-brands fa-square-facebook"></i>
              以FACEBOOK帳號登入
            </button>
            
            <button class="login_connect"  @click="">
              <i class="fa-brands fa-google"></i>
              以GOOGLE帳號登入
            </button>
            
            <button class="login_connect">
              <i class="fa-brands fa-apple"></i>
              以APPLE帳號登入
            </button>
        </form>
      </div>
    </section>

    
  </div>
</template>
<style>

</style>
<script >
import { collection } from 'firebase/firestore'
import {
  getRedirectResult,
  signInWithRedirect,
  signOut,
} from 'firebase/auth'
import { useCurrentUser, useFirebaseAuth } from 'vuefire'
const auth = useFirebaseAuth();


const error = ref(null);
const user = useCurrentUser();
import { mapMutations,mapActions,mapGetters,mapState } from "vuex";

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
      register: {
        nameReg: '',
        emailReg: '',
        pswReg: '',
        pswConfirmReg: '',
        sexReg: '',
        birthReg: '',
        telReg: '',

      },
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
      }
   
  }
  },
methods: {

...mapMutations(["toggleLogin","toggleForgotPsw",'toggleRegister'])
  ,
  closeLogin(){
    this.toggleLogin();
  },
  closeForgot(){
    this.toggleForgotPsw();
  },
    closeModal() {
      this.$store.state.login = false;
    },
    checkLogin() {
      if (this.memId === 'test' && this.memPsw === 'test') {
        window.alert('登入成功');
        loginStatus = true;
      }
      else {
        this.errorMsg = '帳號或密碼輸入錯誤';
      }
      this.register.memId = '';
      this.register.memPsw = '';
    },
    reset() {
      this.register.errorMsg = '';
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
//     signinRedirect() {
//   signInWithRedirect(auth, someAuthProvider).catch((reason) => {
//     console.error('Failed signinRedirect', reason)
//     error.value = reason
//   })
// }

  },
mounted(){
  // getRedirectResult(auth).catch((reason) => {
  //   console.error('Failed redirect result', reason)
  //   error.value = reason
  // })
},
computed:{
  ...mapState(["isLoginOpen","forgotPsw"])
}

  }

</script>




