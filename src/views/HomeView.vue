<template>
  <div class="home">
    <div class="card">
      <div class="pic">
        <img src="https://picsum.photos/300/200/?random=10">
      </div>
      <div class="txt">
        <router-link to="/comic">go shopping now</router-link>
      </div>
    </div>
  </div>
</template>

<script>

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