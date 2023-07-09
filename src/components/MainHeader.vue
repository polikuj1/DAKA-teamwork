<template>
  <div class="container">
    <div class="logo">
      <img src="https://picsum.photos/300/200/?random=5">
    </div>
    <nav>
      <router-link to="/">home</router-link> |
      <router-link to="/about">cart</router-link>|
    </nav>
  </div>
</template>


<script>
export default {
  name: 'MainHeader',
}
</script>

<style lang="scss" scoped>
</style>