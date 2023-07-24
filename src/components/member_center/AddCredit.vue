<template>
  <MbForm>
    <template v-slot:mb_form_title>
      <h3>{{ title }}</h3>
    </template>
    <template v-slot:mb_content>
      <div class="add_credit">
        <form action="">
          <label for="credit_num">輸入卡號</label>
          <input type="text" id="credit_num" maxlength="16" v-model.number="credit_data.number">
          <label for="credit_expire">輸入卡片有效期限</label>
          <input type="month" id="credit_expire" v-model="credit_data.date">
          <label for="security_num" >輸入安全碼</label>
          <input type="text" id="security_num" maxlength="3" v-model.number="credit_data.security">
          <div>
            <input type="checkbox" id="default_card" v-model="credit_data.default">
            <label for="default_card">是否將此信用卡設為預設卡片</label>
          </div>
          <button type="submit" @click.prevent="this.$router.push('/member_center/member_bind_credit')">確認送出</button>
        </form>
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
      title: '新增信用卡',
      credit_data: {
        number: null,
        date: '',
        security: null,
        default: false,
      },
    }
  },
}
</script>