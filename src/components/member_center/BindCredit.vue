<template>
  <MbForm>
    <template v-slot:mb_form_title>
      <h3>信用卡綁定</h3>
    </template>
    <template v-slot:mb_content>
      <div class="credit">
        <span>無可用信用卡</span>
      </div>
    </template>
  </MbForm>
</template>

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