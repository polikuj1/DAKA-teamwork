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
      if(this.path === '/' && this.windowWidth < 1200) {
        this.show = true;
      }
      window.scrollTo(0, 0);
    }
  },
  methods: {
    reviseStatus() {
      if(this.windowWidth > 1200 && window.scrollY < 999 && this.path === '/') {
        this.show = false;
      }
      if(this.windowWidth > 1200 && window.scrollY > 999 && this.path === '/') {
        this.show = true;
      }
      if(this.windowWidth < 1200 && window.scrollY < 999) {
        this.show = true;
      }
      if(this.windowWidth < 1200 && this.path === '/') {
        this.show = true;
      }
    },
  },
  mounted() {
    this.path = this.$route.path;
  },
  created() {
    this.windowWidth = window.innerWidth;
    // if(this.windowWidth < 1200) {
    //   this.show = true;
    // }
    window.addEventListener('resize', () => {
      // console.log(window.innerWidth);
      this.windowWidth = window.innerWidth;
      this.reviseStatus();
    })
    document.addEventListener('scroll', () => {
      this.reviseStatus();
    })
  }
}
</script>


<style lang="scss" scoped>

</style>
