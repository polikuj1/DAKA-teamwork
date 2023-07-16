<template>
  <div class="container">
    <section class="login" v-if="!isRegistered">
      <div class="login_pic">
        <img :src="require('@/assets/images/footerLogo.png')" alt="">
        <p>
          # 快樂就是這麼簡單
        </p>
      </div>

      <div class="login_form">
        <img :src="require('@/assets/images/login/cross.png')" class="close_modal" @click="closeModal">
        <form>

          <input class="login_memid" type="text" name="memId" placeholder="信箱" v-model="memId" @input="reset" require>
          <input type="text" name="memPsw" maxlength="12" placeholder="密碼" v-model="memPsw" @input="reset" require>
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
          <button v-for="btn in btns" class="login_connect" @click.prevent="">
            <img :src="btn.pic" alt="">
            {{ btn.text }}</button>
        </form>
      </div>
    </section>

    <section class="register" v-else>
      <form action="">
        <img :src="require('@/assets/images/login/cross.png')" class="register_close_modal" @click="closeModal">
        <h2>註冊會員</h2>
        <div class="row">
          <div class="col">

            <div class="inputBox">
              <span>名字</span>
              <input type="text" class="payment-name-input" required v-model="nameReg">
              <div class="payment-name"></div>
            </div>
            <div class="inputBox">
              <span>信箱</span>
              <input type="email" class="payment-email-input" required v-model="emailReg">
              <div class="payment-email"></div>
            </div>
            <div class="inputBox">
              <span>密碼</span>
              <input type="number" class="payment-address-input" required v-model="pswReg">
              <div class="payment-address"></div>
            </div>
            <div class="inputBox">
              <span>再次輸入密碼</span>
              <input type="number" class="payment-nation-input" required v-model="pswConfirmReg">
              <div class="payment-nation"></div>
            </div>


          </div>
          <div class="col">
            <div class="inputBox">
              <span>性別</span>
              <select v-model="sexReg">
                <option value="">請選擇</option>
                <option value="man">男</option>
                <option value="wowen">女</option>
              </select>
            </div>
            <div class="inputBox">
              <span>生日</span>
              <input type="date" class="payment-card-name-input" required v-model="birthReg">
            </div>
            <div class="inputBox">
              <span>連絡電話</span>
              <input type="tel" class="payment-card-number-input" maxlength="12" required v-model="telReg">
            </div>
          </div>
        </div>
        <div class="register_form_bottom">
          <div class="">
            <input type="checkbox" name="membership" id="membership">
            <label for="membership">我已詳閱並同意<a href="" target="_blank">會員條款</a>與<a href=""
                target="_blank">隱私權規定</a></label>
          </div>
          <div class="">
            <input type="checkbox" name="news_daka" id="news_daka">
            <label for="news_daka">我願意收到打咖DAKA的最新消息</label>
          </div>
          <button class="register_submit" @click.prevent="columnCheck">註冊會員</button>
        </div>


      </form>

    </section>

    <section class="forget_password" v-if="forgetPsw">
      <img :src="require('@/assets/images/login/cross.png')" class="forget_close_modal" @click="closeModal">
   <h2>忘記密碼</h2>
   <p>請輸入您的註冊信箱，進行密碼變更</p>
   <div class="forget_password_enter">
    <label for="">請輸入您的信箱</label>
    <input type="text" placeholder="信箱">
   </div>
   <button>下一步</button>
  </section>

  <section class="enter_valid" v-if="forgetPsw">
      <img :src="require('@/assets/images/login/cross.png')" class="forget_close_modal" @click="closeModal">
   <h2>輸入驗證碼</h2>
   <p>已發送驗證碼至sm********@gmail.com</p>
   <p>10 分鐘內若未收到驗證碼
<br>請按此重新發送</p>
   <button>送出</button>
  </section>
  </div>

</template>
<style>
@import '@/assets/scss/page/login.scss';
</style>
<script>
export default {
  name: 'login',
  data() {
    return {
      memId: '',
      memPsw: '',
      loginStatus: false,
      isRegistered: false,
      forgetPsw: false,
      nameReg: '',
      emailReg: '',
      pswReg: '',
      pswConfirmReg: '',
      sexReg: '',
      birthReg: '',
      telReg: '',
      errorMsg: '',
      btns: [
        {
          text: '以FACEBOOK帳號登入',
          pic: require('@/assets/images/login/facebook.svg'),
        },
        {
          text: '以GOOGLE帳號登入',
          pic: require('@/assets/images/login/google.svg')
        },
        {
          text: '以APPLE帳號登入',
          pic: require('@/assets/images/login/apple.svg')
        },
      ]



    }
  },

  methods: {
    closeModal() {
      this.$emit('emit-status');
    },
    checkLogin() {
      if (this.memId === 'test' && this.memPsw === 'test') {
        window.alert('登入成功');
        loginStatus= true;
      } else {
        this.errorMsg = '帳號或密碼輸入錯誤';
      }
      this.memId = '';
      this.memPsw = '';
    },
    reset() {
      this.errorMsg = '';
    },
    changeRegister() {
      this.isRegistered = true;
      
    },
    columnCheck() {
      if (this.nameReg !== '' && this.emailReg !== '' && this.pswReg !== '' && this.pswConfirmReg !== '' && this.birthReg !== '' && this.sexReg !== '' && this.telReg !== '') {
        if (this.pswReg === this.pswConfirmReg && this.pswReg.length >= 6 && this.pswReg.length <= 12) {
          console.log('註冊成功');

        } else {
          console.log('密碼輸入有誤');
        }
      } else {
        window.alert('請完整輸入');
      }
    },
    forgetPassword(){
      this.forgetPsw = true;
    }

  }
}

</script>

<script>

</script>


