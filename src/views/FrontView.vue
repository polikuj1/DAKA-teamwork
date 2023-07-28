<template>
  <MainHeader :path="path" :show="show"></MainHeader>
  <router-view/>
  <Footer></Footer>
  <MainMenu />
</template>



<script>
import MainHeader from '@/components/MainHeader.vue';
import Footer from '@/components/Footer.vue';
import MainMenu from '@/components/HbMenu.vue';



export default {
  components: {
    MainHeader,Footer,MainMenu,
  },
  data() {
    return {
      path: '',
      show: false,
      windowWidth: 0,
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
  },
  mounted() {
    this.path = this.$route.path;
    this.windowWidth = window.innerWidth;
  },
  created() {
    window.addEventListener('resize', () => {
      this.windowWidth = window.innerWidth;
      this.reviseStatus();
    })
    document.addEventListener('scroll', () => {
      this.reviseStatus();
    })
    this.windowWidth = window.innerWidth;
  }
}
</script>


<style lang="scss" scoped>

</style>
