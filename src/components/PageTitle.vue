<template>
  <div class="pageTitle">
    <h2><slot>default</slot></h2>
    <div class="graphics">
      <span class="circle"></span>
      <span class="square"></span>
      <span class="circle"></span>
      <span class="square"></span>
      <span class="circle"></span>
      <span class="square"></span>
    </div>
    <div class="graphics">
      <span class="circle"></span>
      <span class="square"></span>
      <span class="circle"></span>
      <span class="square"></span>
      <span class="circle"></span>
      <span class="square"></span>
    </div>
  </div>
</template>

<script>
// import '@/assets/js/pageTitle.js';
export default {
  data() {
    return {
      windowWidth: 0,
    }
  },
  methods: {

  },
  computed: {

  },
  mounted() {
    // window.addEventListener('resize',() => {
    //   this.windowWidth = window.innerWidth;
    //   console.log(this.windowWidth);
    // })
  },
  created() {
    
  },
}
</script>