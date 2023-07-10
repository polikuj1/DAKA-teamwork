<template>
  <MainHeader></MainHeader>
  <router-view/>
  <Footer></Footer>
</template>



<script>
import MainHeader from '@/components/MainHeader.vue';
import Footer from '@/components/Footer.vue';
export default {
  components: {
    MainHeader,Footer,
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
