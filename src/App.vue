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
    }
  },
  watch: {
    '$route.path': function(newPath, oldPath) {
      // console.log('新的',newPath);
      this.path = newPath;
      // console.log(this.path);
    }
  },
  mounted() {
    this.path = this.$route.path;
  },
  created() {
    document.addEventListener('scroll', () => {
      if(window.scrollY > 1000 && this.path === '/') {
        console.log(123);
        this.show = true;
      } else {
        this.show = false;
      }
    })
  }
}
</script>


<style lang="scss">

</style>
