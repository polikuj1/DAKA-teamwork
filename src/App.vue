<template>
  <MainHeader></MainHeader>
  <router-view/>
</template>



<script>
import MainHeader from '@/components/MainHeader.vue';

export default {
  components: {
    MainHeader,
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
