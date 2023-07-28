<template>
  <MainHeader :path="path" :show="show"></MainHeader>
  <router-view/>
  <Footer></Footer>
  <MainMenu />
  <div class="main_game_btn">
    <div @click="goGame">
      <img src="@/assets/images/button_gaming.png" alt="">
    </div>
  </div>
  <SideButton v-show="btn_show"/>
</template>



<script>
import SideButton from '@/components/SideButton.vue';
import MainHeader from '@/components/MainHeader.vue';
import Footer from '@/components/Footer.vue';
import MainMenu from '@/components/HbMenu.vue';



export default {
  components: {
    MainHeader,Footer,MainMenu,SideButton,
  },
  data() {
    return {
      path: '',
      show: false,
      windowWidth: 0,
      btn_show: false,
    }
  },
  watch: {
    '$route.path': function(newPath, oldPath) {
      this.path = newPath;
      console.log(this.path);
      if(this.path === '/index' && this.windowWidth < 1200) {
        this.show = false;
        setTimeout(() => {
          this.show = true;
        },100);
      }
      window.scrollTo(0, 0);
    }
  },
  methods: {
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
    goGame() {
      console.log(123);
      this.$router.push('/game');
    },
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
  }
}
</script>


<style lang="scss" scoped>

</style>
