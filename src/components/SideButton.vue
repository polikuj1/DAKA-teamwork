<template>
  <div class="main_side_btn">
    <div @click="goTop">
      <img src="@/assets/images/button_go_top.png" alt="">
    </div>
  </div>
</template>
<script>
export default {
  name: '',
  data() {
    return {
      
    }
  },
  methods: {
    goTop() {
      window.scrollTo(0, 0);
    }
  },
  computed: {

  },
  components: {

  },
  mounted() {
    
  },
}
</script>