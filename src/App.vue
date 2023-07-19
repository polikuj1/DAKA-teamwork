<template>
  <MainHeader></MainHeader>
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

    }
  },
}
</script>


<style lang="scss">
@import "@/assets/scss/_style.scss";
</style>
