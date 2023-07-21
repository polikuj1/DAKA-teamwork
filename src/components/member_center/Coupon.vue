<template>
    <MbForm>
      <template v-slot:mb_form_title>
        <h3>優惠券</h3>
      </template>
      <template v-slot:mb_content>
        <div class="credit">
          <span>測試CSS</span>
        </div>
      </template>
    </MbForm>
  </template>
  
  <style>
  @import "@/assets/scss/component/coupon.scss";
  </style>

  <script>
  import MbForm from '@/components/member_center/form_style.vue';
  export default {
    components: {
      MbForm,
    },
    data() {
      return {
  
      }
    },
  }
  </script>