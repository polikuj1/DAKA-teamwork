<template>
  <section v-show="isRegister && step == 0">
    <div class="container">
      <div class="register">
        <form @submit.prevent="handleSubmit">
          <img :src="require('@/assets/images/login/cross.png')" class="register_close_modal"
            @click="closeRegister(false)">
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
                <input type="password" class="payment-address-input" v-model="pswReg" required="required" />
                <div class="payment-address"></div>
              </div>
              <div class="inputBox">
                <span>再次輸入密碼</span>
                <input type="password" class="payment-nation-input" required="required" v-model="pswConfirmReg">
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
                <input type="date" class="payment-card-name-input" v-model="birthReg" min="1900-01-01" max="2005-08-05"
                  required="required">
              </div>
              <div class="inputBox">
                <span>連絡電話</span>
                <input type="tel" class="payment-card-number-input" maxlength="12" required="required" v-model="telReg">
              </div>
            </div>
          </div>
          <div class="register_form_bottom">
            <div>
              <input type="checkbox" name="membership" id="membership" required="required">

              <label for="membership">我已詳閱並同意<a href="/member_terms" target="_blank" @click="checkMemberTerms">會員條款</a>與<a
                  href="/member_privacy" target="_blank" @click="checkMemberPrivacy">隱私權規定</a></label>
            </div>
            <div c>
              <input type="checkbox" name="news_daka" id="news_daka" required="required">
              <label for="news_daka">我願意收到打咖DAKA的最新消息</label>
            </div>

            <input class="register_submit" type="submit" value="註冊會員">
          </div>


        </form>
      </div>
    </div>

  </section>

  <section v-show="isRegister && step == 1">
    <div class="container">
      <div class="register_success">
        <img :src="require('@/assets/images/login/cross.png')" class="register_close_success_modal"
          @click="closeRegister(false)">
        <img :src="require('@/assets/images/footerLogo.png')" alt="DAKA-logo" class="register_success_logo">
        <p>註冊完成！</p>
        <p>請重新登入</p>
        <button @click="backLogin">返回會員登入</button>
      </div>

    </div>
  </section> 
   
</template>
<script >
import { mapMutations, mapActions, mapGetters, mapState } from "vuex";
import axios, { Axios } from "axios";


export default {
  name: 'register',
  data() {
    return {
      step: 0,
      register: {
        nameReg: '',
        emailReg: '',
        pswReg: '',
        pswConfirmReg: '',
        sexReg: '',
        birthReg: '',
        telReg: '',
        memberTerms: false,
        memberPrivacy: false,
      },
    }
  },
  methods: {
    ...mapMutations(["toggleLogin", "toggleForgotPsw", 'toggleRegister'])
    ,
    closeRegister(status) {
      this.toggleRegister(status);
      this.clearInput();
    },
    clearInput() {
      this.register.nameReg = this.register.emailReg = this.register.pswReg = this.register.pswConfirmReg = this.register.sexReg = this.register.birthReg = this.register.telReg = '';
      this.step = 0;
      this.memberTerms = this.memberPrivacy = false;
    },
    backLogin() {
      this.toggleRegister(true);
      this.step = 0;
      this.clearInput();
    },

    handleSubmit() {

      if (this.validateForm() && this.memberTerms && this.memberPrivacy && this.sexReg && this.telReg && this.sexReg) {

        this.submitForm();
      } else {
        alert('輸入不完整!');
      }

    },
    validateForm() {
      const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      const passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{6,12}$/;
      const passwordConfirmRegex = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{6,12}$/;

      const isEmailValid = emailRegex.test(this.emailReg);
      const isPswValid = passwordRegex.test(this.pswReg);
      const isPswConfirmValid = passwordConfirmRegex.test(this.pswConfirmReg);

      return isEmailValid && isPswValid && isPswConfirmValid && (this.pswReg === this.pswConfirmReg);

    },
    submitForm() {
      this.step = 1;

      console.log(this.step);
      // axios.post()
    },
    checkMemberTerms() {
      this.memberTerms = true;
      console.log(this.memberTerms);
    },
    checkMemberPrivacy() {
      this.memberPrivacy = true;
      console.log(this.memberPrivacy);
    },

  },
  mounted() {

  },
  computed: {
    ...mapState(["isLoginOpen", "forgotPsw", 'isRegister'])
  }

}

</script>




