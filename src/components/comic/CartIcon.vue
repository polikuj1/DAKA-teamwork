<template>
  <div class="cart_icon">
    <div class="wrap">
      <div class="cart_info" v-show="infoOpen">
        <button @click="infoOpen = false"><i class="fa-solid fa-xmark"></i></button>
        <span v-if="bookData.length === 0">您還沒有預約任何一本書， 請開始 <a href="">預約</a> 吧！</span>
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
          <button>前往預約</button>
        </div>
      </div>
      <div class="icon" @click="infoOpen = true">
        <span><img src="@/assets/images/comic/book.svg" alt="bool"></span>
        <img src="@/assets/images/home/circle04.png" alt="circle">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['bookData'],
  data() {
    return {
      infoOpen: false,
      bookList: [],
    }
  },
  methods: {
    deleteBook(index) {
      this.bookData.splice(index,1);
    },
  },
}
</script>