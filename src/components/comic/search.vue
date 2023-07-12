<template>
  <div class="search">
    <input type="search" placeholder="輸入漫畫名稱" 
    v-model="search" @keyup.enter="emitTxt">
    <button type="button" @click="emitTxt"><i class="fa-solid fa-magnifying-glass"></i></button>
  </div>
  
</template>

<script>
export default {
  data() {
    return {
      search: '',
    }
  },
  watch: {
    search() {
      if(this.search === '') {
        this.$emit('emit-txt', this.search);
      }
    },
  },
  methods: {
    emitTxt() {
      // console.log(123);
      this.$emit('emit-txt', this.search);
    }
  },
  computed: {

  },
}
</script>