<template>
  <div class="cart_icon">
    <div class="wrap">
      <div class="icon" @click="infoOpen = true">
        <span><img src="@/assets/images/comic/book.svg" alt="bool"></span>
        <img src="@/assets/images/home/circle04.png" alt="circle">
      </div>
      <div class="cart_info" v-show="infoOpen">
        <button @click="infoOpen = false"><i class="fa-solid fa-xmark"></i></button>
        <span>您還沒有預約任何一本書， 請開始 <a href="">預約</a> 吧！</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      infoOpen: false,
    }
  },
  methods: {
    // checkList() {
    //   this.infoOpen = true;
    // }
  },
}
</script>