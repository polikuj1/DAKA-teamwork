<template>
  <div class="home">
    <div class="card">
      <div class="pic">
        <img src="https://picsum.photos/300/200/?random=10">
      </div>
      <div class="txt">
        <router-link to="/product">go shopping now</router-link>
      </div>
    </div>
    <!-- <HelloWorld msg="Welcome to Your Vue.js App"/> -->
  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
export default {
  name: 'HomeView',
  components: {
    // HelloWorld
  }
}
</script>
<style lang="scss" scoped>
@import '@/assets/scss/page/home.scss';
</style>