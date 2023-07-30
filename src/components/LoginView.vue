<template>
  <div class="container">


    <section class="login" v-if="!isRegistered && !loginStatus && !forgetPsw && step === 0">
      <div class="login_pic">
        <img :src="require('@/assets/images/footerLogo.png')" alt="">
        <p>
          # 快樂就是這麼簡單
        </p>
      </div>

      <div class="login_form">
        <img :src="require('@/assets/images/login/cross.png')" class="close_modal" @click="closeModal">
        <form>

          <input class="login_memid" type="text" name="memId" placeholder="信箱" v-model="memId" @input="errorMsg = ''"
            require>
          <input type="text" name="memPsw" maxlength="12" placeholder="密碼" v-model="memPsw" @input="errorMsg = ''"
            require>
          <div class="error_message">{{ errorMsg }}</div>
          <div class="login_keep">
            <div class="login_keep_status">
              <input type="checkbox" name="check" id="check">
              <label for="check">保持登入狀態</label>
            </div>
            <div class="forget_psw" @click="forgetPassword">忘記密碼?</div>
          </div>
          <button class="login_form_submit" @click.prevent="checkLogin">登入</button>
          <button @click.prevent="changeRegister" class="login_form_register">註冊會員</button>
          <span>OR</span>
          

            <button class="login_connect" @click.prevent="">
              <i class="fa-brands fa-square-facebook"></i>
              以FACEBOOK帳號登入
            </button>
            
            <button class="login_connect"  @click="signinRedirect">
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

    <section class="register" v-if="isRegistered">
      <form action="">
        <img :src="require('@/assets/images/login/cross.png')" class="register_close_modal" @click="closeModal">
        <h2>註冊會員</h2>
        <div class="row">
          <div class="col">

            <div class="inputBox">
              <span>名字</span>
              <input type="text" class="payment-name-input" required="required" v-model="nameReg">
              <div class="payment-name"></div>
            </div>
            <div class="inputBox">
              <span>信箱</span>
              <input type="email" class="payment-email-input" v-model="emailReg" required="required" />
              <div class="payment-email"></div>
            </div>
            <div class="inputBox">
              <span>密碼</span>
              <input type="text" class="payment-address-input" v-model="pswReg" required="required" />
              <div class="payment-address"></div>
            </div>
            <div class="inputBox">
              <span>再次輸入密碼</span>
              <input type="text" class="payment-nation-input" required="required" v-model="pswConfirmReg">
              <div class="payment-nation"></div>
            </div>


          </div>
          <div class="col">
            <div class="inputBox">
              <span>性別</span>
              <select v-model="sexReg">
                <option value="">請選擇</option>
                <option value="male">男</option>
                <option value="female">女</option>
              </select>
            </div>
            <div class="inputBox">
              <span>生日</span>
              <input type="date" class="payment-card-name-input" v-model="birthReg" min="1900-01-01" max="2021-01-01"
                required="required">
            </div>
            <div class="inputBox">
              <span>連絡電話</span>
              <input type="tel" class="payment-card-number-input" maxlength="12" required="required" v-model="telReg">
            </div>
          </div>
        </div>
        <div class="register_form_bottom">
          <div class="">
            <input type="checkbox" name="membership" id="membership" required="required">
            <label for="membership">我已詳閱並同意<a href="/member_terms" target="_blank">會員條款</a>與<a href="/member_privacy"
                target="_blank">隱私權規定</a></label>
          </div>
          <div class="">
            <input type="checkbox" name="news_daka" id="news_daka" required="required">
            <label for="news_daka">我願意收到打咖DAKA的最新消息</label>
          </div>
          <input class="register_submit" @click="columnCheck" type="submit" value="註冊會員">
        </div>


      </form>

    </section>

    <section class="forget_password" v-if="forgetPsw && step === 1">
      <img :src="require('@/assets/images/login/cross.png')" class="forget_close_modal" @click="closeModal">
      <h2>忘記密碼</h2>
      <p>請輸入您的註冊信箱，進行密碼變更</p>
      <div class="forget_password_enter">
        <label for="">請輸入您的信箱</label>
        <input type="email" placeholder="信箱" v-model="memEmail" required="required">
      </div>
      <input @click="checkEmail" type="submit" value="下一步" class="forget_password_submit">
    </section>

    <section class="enter_valid" v-if="forgetPsw && step === 2">
      <img :src="require('@/assets/images/login/cross.png')" class="forget_close_modal" @click="closeModal">
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
    </section>

    <section class="enter_modify" v-if="forgetPsw && step === 3">
      <img :src="require('@/assets/images/login/cross.png')" class="modify_close_modal" @click="closeModal">
      <h2>修改密碼</h2>
      <p>請輸入 6 -12 位包含英文及數字的密碼</p>
      <div class="enter_modify_input">
        <label for="modifyPsw">新密碼</label>
        <input type="text" required="required" v-model="modify.psw" maxlength="12" minlength="6" id="modifyPsw">
        <label for="modifyNewPsw">再次輸入新密碼</label>
        <input type="text" required="required" v-model="modify.newPsw" maxlength="12" minlength="6" id="modifyNewPsw">
      </div>
      <input @click="modifyCheck" type="submit" value="送出" class="enter_modify_submit">
    </section>

    <section class="enter_modify_success" v-if="forgetPsw && step === 4">
      <img :src="require('@/assets/images/login/cross.png')" class="modify_close_success_modal" @click="closeModal">
      <img :src="require('@/assets/images/footerLogo.png')" alt="" class="enter_modify_success_logo">
      <p>修改完成！</p>
      <p>請重新登入</p>
      <button @click="modifySuccess">返回會員登入</button>
    </section>

    <section class="enter_modify_success" v-if="step === 5">
      <img :src="require('@/assets/images/login/cross.png')" class="modify_close_success_modal" @click="closeModal">
      <img :src="require('@/assets/images/footerLogo.png')" alt="DAKA-logo" class="enter_modify_success_logo">
      <p>註冊完成！</p>
      <p>請重新登入</p>
      <button @click="registerSuccess">返回會員登入</button>
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

// display errors if any
const error = ref(null);
const user = useCurrentUser();

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
      },
      documents: [],
      firestore: {
    documents: collection(db, 'documents'),
  },


    }
  },


  methods: {
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
    changeRegister() {
      this.isRegistered = true;

    },
    columnCheck() {

      if (this.register.pswReg === this.register.pswConfirmReg&&this.register.pswReg!='') {

        this.isRegistered = false;
        this.step = 5;

      }else{
        return
      }

    },
    forgetPassword() {
      this.forgetPsw = true;
      this.step = 1;
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
    registerSuccess() {

      this.step = 0;

    },
    signinRedirect() {
  signInWithRedirect(auth, someAuthProvider).catch((reason) => {
    console.error('Failed signinRedirect', reason)
    error.value = reason
  })
}

  },
mounted(){
  getRedirectResult(auth).catch((reason) => {
    console.error('Failed redirect result', reason)
    error.value = reason
  })
}
  }

</script>




