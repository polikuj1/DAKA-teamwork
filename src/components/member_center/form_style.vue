<template>
  <div class="member_form">
   <div class="title">
    <slot name="mb_form_title">預設標題</slot>
    <button type="button" @click="backToCenter">
      <i class="fa-solid fa-circle-chevron-left"></i>
    </button>
   </div>
   <slot name="mb_content">預設內容</slot>
   <slot name="mb_modal"></slot>
  </div>
</template>

<script>
export default {
  data() {
    return {

    }
  },
  methods: {
    backToCenter() {
      this.$router.go(-1);
      this.$emit('emit-back');
    }
  }
}
</script>