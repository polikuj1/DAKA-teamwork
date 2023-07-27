<template>
  <div class="cart_icon">
    <div class="wrap">
      <div class="cart_info" v-show="infoOpen">
        <button @click="infoOpen = false"><i class="fa-solid fa-xmark"></i></button>
        <span v-if="bookData.length === 0">您還沒有預約任何一本書， 請開始 <a @click="this.$router.push('/comic_search')">預約</a> 吧！</span>
        <div class="reservation_list" v-else>
          <ul>
            <li v-for="(book,index) in bookData" :key="book.title">
              <div>
                <span>{{ book.title }} {{ book.index }}</span>
                <span>{{ book.author }}</span>
              </div>
              <span @click="deleteBook(index)"><i class="fa-solid fa-trash-can"></i></span>
            </li>
          </ul>
          <p v-show="this.$store.state.cart.length === 5" style="color: red; margin-top: 10px;">已達預約書籍上限</p>
          <button @click="this.$router.push('/comic_cart')">前往預約</button>
        </div>
      </div>
      <div class="icon" @click="infoOpen = true">
        <span class="reservation_num" v-show="bookData.length !== 0">{{ bookData.length }}</span>
        <span><img src="@/assets/images/comic/book.svg" alt="bool"></span>
        <img src="@/assets/images/home/circle04.png" alt="circle">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  // props: ['bookData'],
  data() {
    return {
      infoOpen: false,
      bookList: [],
      bookData: [],
    }
  },
  methods: {
    deleteBook(index) {
      // this.bookData.splice(index,1);
      this.$store.commit('deleteBook',index);
    },
  },
  created() {
    this.bookData = this.$store.state.cart;
  }
}
</script>