<template>
    <MbForm @emit-back="triggerParent">
      <template v-slot:mb_form_title>
        <h3>{{ title }}</h3>
      </template>
      <template v-slot:mb_content>
        <div id="member_edit">
          <form class="edit_content">
            <div class="edit_item">
              <label for="name">姓名</label>
              <input type="text" v-model="name" />
            </div>
            <div class="edit_item">
              <label for="birthday">生日</label>
              <input type="date" class="birth_date" v-model="birthday" />
            </div>
            <div class="edit_item">
              <label for="address">地址</label>
              <input type="text" v-model="address" />
            </div>
            <div class="edit_item">
              <label for="phone">電話</label>
              <input type="tel" v-model="phone" />
            </div>
            <div class="edit_item">
              <label for="email">信箱</label>
              <input type="email" v-model="email" />
            </div>
            <div class="edit_item">
              <label for="password">修改密碼</label>
              <input type="password" v-model="password" placeholder="請輸入新密碼" />
            </div>
            <div class="confirm_password">
              <input type="password" v-model="confirmPassword" placeholder="請再次輸入新密碼" />
            </div>
            <button type="submit" @click="submitForm" class="sumbit_edit">確認修改</button>
          </form>
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
        title: '會員資料編輯',
        name: '',
        birthday: '',
        address: '',
        phone: '',
        email: '',
        password: '',
        confirmPassword: '',
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
    submitForm() {
      // 在這裡寫提交表單的程式碼，可以將資料送至後台或執行其他操作
      console.log('表單提交成功！');
    },
  }
  </script>