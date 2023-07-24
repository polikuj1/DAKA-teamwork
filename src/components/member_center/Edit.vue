<template>
    <MbForm @emit-back="triggerParent">
      <template v-slot:mb_form_title>
        <h3>會{{ title }}</h3>
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
        title: '個人資料編輯',
      }
    },
    methods: {
      triggerParent() {
        this.$emit('emit-title','');
      }
    },
    created() {
      this.$emit('emit-title',this.title);
    },
  }
  </script>