<template>
  <div class="pagination" :class="active">
    <span @click="this.$emit('prev-page',-1);"><i class="fa-solid fa-angle-left"></i></span>
    <span v-for="num in page" :key="num" @click="changePage(num)">{{ num }}</span>
    <span @click="this.$emit('next-page',1);"><i class="fa-solid fa-angle-right"></i></span>
  </div>
</template>
<script>
export default {
  props: ['page'],
  data() {
    return {

    }
  },
  methods: {
    changePage(num) {
      this.$emit('emit-page',num);
    },
  }
}
</script>