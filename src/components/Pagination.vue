<template>
  <div class="pagination">
    <span @click="prevPage(-1)"><i class="fa-solid fa-angle-left"></i></span>
    <span :class="{active: num === currentPage}" v-for="(num,index) in page" :key="num" @click="changePage(num)">{{ num }}</span>
    <span @click="nextPage(1)"><i class="fa-solid fa-angle-right"></i></span>
  </div>
</template>
<script>
export default {
  props: ['page'],
  data() {
    return {
      currentPage: 1,
    }
  },
  methods: {
    changePage(num) {
      this.$emit('emit-page',num);
      this.currentPage = num;
    },
    prevPage(num) {
      if(this.currentPage === 1) return;
      this.currentPage += num;
      this.$emit('prev-page',-1);
    },
    nextPage(num) {
      if(this.currentPage === this.page) return;
      this.currentPage += num;
      this.$emit('next-page',1);
    }
  }
}
</script>