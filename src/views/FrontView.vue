<template>
  <MainHeader :path="path" :show="show"></MainHeader>
  <router-view/>
  <Footer></Footer>
  <MainMenu />
  <div class="main_game_btn">
    <div @click=" checkLogin">
      <img src="@/assets/images/button_gaming.png" alt="">
    </div>
  </div>
  <SideButton v-show="btn_show"/>
  <div class="loading" v-show="loading">
    <p>網頁載入中，請稍後...</p>
    <div class="pic">
      <img src="@/assets/images/loading_page.svg" alt="載入中">
    </div>
  </div>
</template>



<script>
import SideButton from '@/components/SideButton.vue';
import MainHeader from '@/components/MainHeader.vue';
import Footer from '@/components/Footer.vue';
import MainMenu from '@/components/HbMenu.vue';
import { mapMutations,mapActions,mapGetters,mapState } from "vuex";


export default {
  components: {
    MainHeader,Footer,MainMenu,SideButton,
  },
  data() {
    return {
      loading: true,
      path: '',
      show: false,
      windowWidth: 0,
      btn_show: false,
    }
  },
  watch: {
    '$route.path': function(newPath, oldPath) {
      this.path = newPath;
      // console.log(this.path);
      if(this.path === '/index' && this.windowWidth < 1200) {
        this.show = false;
        setTimeout(() => {
          this.show = true;
        },100);
      }
      // window.scrollTo(0, 0);
    }
  },
  computed: {
    ...mapState(["isLoginOpen","forgotPsw",'login']),
  },
  methods: {
    ...mapMutations(["toggleLogin","toggleForgotPsw",'toggleRegister']),
    reviseStatus() {
      if(this.windowWidth > 1200 && window.scrollY < 999 && this.path === '/index') {
        this.show = false;
      }
      if(this.windowWidth > 1200 && window.scrollY > 999 && this.path === '/index') {
        this.show = true;
      }
      if(this.windowWidth < 1200 && window.scrollY < 999) {
        this.show = true;
      }
      if(this.windowWidth < 1200 && this.path === '/index') {
        this.show = true;
      }
    },
    show_btn() {
      if(window.scrollY > 1000) {
        this.btn_show = true;
      } else {
        this.btn_show = false;
      }
    },
    checkLogin() {   
      if (!this.login) {
        this.toggleLogin(true);
      } else {
        this.$router.push('/game');
      }
    }
  },
  mounted() {
    this.path = this.$route.path;
    this.windowWidth = window.innerWidth;
  },
  created() {
    this.windowWidth = window.innerWidth;
    window.addEventListener('resize', () => {
      this.windowWidth = window.innerWidth;
      this.reviseStatus();
    })
    document.addEventListener('scroll', () => {
      this.show_btn()
      this.reviseStatus();
    })
    setTimeout(() => {
      this.loading = false;
    },5000)
  }
}
</script>


<style lang="scss" scoped>
.loading {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 2000;
  background-color: #123749;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  p {
    font-size: 50px;
    margin-bottom: 50px;
    animation: bling 1s linear infinite;
  }
  .pic {
    // transform: scale(0.7);
    width: 200px;
    height: 200px;
    animation: rotate 2s linear infinite;
    img {
      width: 100%;
      height: 100%;
    }
  }

}
 @keyframes rotate {
  to {
    transform: rotate(360deg);
  }
 }
 @keyframes bling {
  from {
    opacity: 0.2;
  }
  to {
    opacity: 8;
  }
 }
</style>
