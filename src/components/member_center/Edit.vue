<template>
    <MbForm>
      <template v-slot:mb_form_title>
        <h3>會員資料修改</h3>
      </template>
      <template v-slot:mb_content>
        <div class="credit">
          <span>測試CSS</span>
        </div>
      </template>
    </MbForm>
  </template>
  
  <style>
  @import "@/assets/scss/component/member_edit.scss";
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