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
          <button @click.prevent="toRegister" class="login_form_register" type="submit">註冊會員</button>
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
      error: null,
      memberData: [],
      matchedUser: null,
    }
  },
  computed: {
    ...mapState(["isLoginOpen", "forgotPsw", 'login', 'member', 'keepLoginStatus', 'userTokenKey', 'loginModal'])

  },
  methods: {
    ...mapMutations(["toggleLogin", "toggleForgotPsw", 'toggleRegister', 'setInfo', 'loginOk', 'keepLoginOn', 'toggleLoginStatus', 'setToStorage', 'setRegisterInfo', 'toggleLoginModal'])
    ,
    closeLogin() {
      this.toggleLogin(false);
      this.reset();
    },
    closeForgot() {
      this.toggleForgotPsw();
    },
    toRegister(){
      this.toggleRegister(true);
      this.toggleLogin(false);
    },
    checkLogin() {
  const loginData = {
    memId: this.memId,
    memPsw: this.memPsw,
  };

  axios.post(`${this.$URL}/login.php`, JSON.stringify(loginData), {
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => {
    const responseData = response.data;
    
    //登入成功
    if (responseData.mem_no) { 
      this.setInfo(responseData);
      this.loginOk(true);
      this.toggleLoginModal(true);
      setTimeout(() => {
        this.toggleLoginModal(false);
      }, 3000)
      if (this.keepLoginStatus) {
        this.setToStorage();
      } else {
        this.reset(); 
      }
    } else {
      this.errorMsg = "帳號密碼錯誤"; // 登入失敗
    }

    
  })
  .catch(error => {
    console.log(error);
  });
},

    reset() {
      this.memId = this.memPsw = this.errorMsg = '';
      this.toggleLoginStatus();
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
          // 抓到資料後執行tokenCheck()比對localstorage裡的資料
          this.tokenCheck();
        })
        .catch((err) => {
          console.log(err);
        })


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


<style lang="scss" scoped>
.login_modal {
  width: 100%;
  height: 100%;
  position: fixed;
  inset: 0 0 0 0;
  z-index: 1200;
  background-color: rgb(255, 255, 255, 0.8);

  .modal {
    width: 30%;
    background-color: #fff;
    border-radius: 10px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    padding: 30px;
    box-shadow: 0 0 2px #aaa;

    .pic {
      width: 50%;
      margin: 0 auto 20px;

      img {
        width: 100%;
        height: 100%;
      }
    }
  }
}

@media screen and (max-width:767px) {
  .reservation_modal {
    .modal {
      width: 60%;
    }
  }
}
</style>

