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
          <p v-show="warnTxt">輸入資料格式有誤，請確認</p>
          <button type="submit" @click.prevent="submit">確認送出</button>
        </form>
      </div>
    </template>
    <template v-slot:mb_modal>
      <MbModal v-show="modalSwitch">
        <template v-slot:modal_txt>
          <div class="bind_success">
            <span>綁定成功！</span>
            <button @click="back">返回</button>
          </div>
        </template>
      </MbModal>
    </template>
  </MbForm>
</template>

<script>
import MbModal from '@/components/member_center/MemberModal.vue'
import MbForm from '@/components/member_center/form_style.vue';
export default {
  components: {
    MbForm, MbModal,
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
      modalSwitch: false,
      warnTxt: false,
    }
  },
  methods: {
    back() {
      this.modalSwitch = false;
      this.$router.push('/member_center/member_bind_credit');
    },
    submit() {
      if(this.credit_data.number === null) {this.warnTxt = true;return};
      let num = this.credit_data.number.toString();
      let regex = /^[0-9]{3}$/;
      let result = regex.test(this.credit_data.security);
      // 表單驗證
      if(!this.credit_data.number || !this.credit_data.date || !this.credit_data.security || num.length !== 16 || !result) {
        this.warnTxt = true;
        return;
      } else {
        this.warnTxt = false;
        // 送出表單到後端
        // this.$router.push('/member_center/member_bind_credit')
        this.modalSwitch = true;
      }
    }
  },
}
</script>