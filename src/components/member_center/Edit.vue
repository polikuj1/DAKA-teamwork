<template>
    <MbForm @emit-back="triggerParent">
      <template v-slot:mb_form_title>
        <h3>{{ title }}</h3>
      </template>
      <template v-slot:mb_content>
        <div id="member_edit">
          <form class="edit_content" enctype="multipart/form-data" method= "post">
            <!-- <input type="text" name="memid" v-model="memberData.memid" style="display: none;"> -->
            <div class="edit_item">
              <label for="name">姓名</label>
              <input type="text" v-model="memberData.mname" name="mname"/>
            </div>
            <div class="edit_item">
              <label for="gender">性別</label>
              <input type="text" v-model="memberData.sex" readonly name="sex"/>
            </div>
            <div class="edit_item">
              <label for="birthday">生日</label>
              <input type="date" v-model="memberData.member_birth" readonly class="edit_birth" name="birthday"/>
            </div>
            <div class="edit_item">
              <label for="address">地址</label>
              <input type="text" v-model="memberData.address" name="address" />
            </div>
            <div class="edit_item">
              <label for="mobile">手機</label>
              <input type="tel" v-model="memberData.mobile" maxlength="12" name="phone"/>
            </div>
            <div class="edit_item">
              <label for="email">信箱</label>
              <input type="email" v-model="memberData.email" name="mail"/>
            </div>
            <div class="edit_item">
              <label for="password">修改密碼</label>
              <input type="password" v-model="memberData.new_password" pattern="[A-Za-z0-9]{6,12}" placeholder="請輸入新密碼" name="password"/>
            </div>
            <div class="confirm_password">
              <input type="password" pattern="[A-Za-z0-9]{6,12}" placeholder="請再次輸入新密碼" v-model="memberData.new_password_confirm"/>
            </div>
            <button type="submit" @click.prevent="submitForm" class="sumbit_edit">確認修改</button>
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
        memberData: {},
        id: null,
      }
    },
    methods: {
      triggerParent() {
        this.$emit('emit-title','');
      },
      submitForm() {
        if(this.memberData.new_password !== this.memberData.new_password_confirm) {alert('兩次密碼不一致'); return};
        console.log('表單提交成功！');
        this.axios.post(`${this.$URL}/editMember.php`, JSON.stringify(this.memberData), {
          headers: {
            'Content-Type': 'application/json'
          }
        })
          .then(res => {
            console.log(res);
            if(res.data === 'success') {
              alert('修改成功');
              this.getData();
              this.$store.commit('setInfo', this.memberData);
            } else {
              alert('異動失敗');
            }
          })
          .catch(err => {
            console.log(err);
          })
      },
      getData() {
        const params = {
          id: this.id
        }
        console.log('ID',params.id);
        this.axios.get(`${this.$URL}/getMember.php`,{params: params})
          .then(res => {
            console.log(res);
            this.memberData = res.data[0];
            // this.$store.commit('setInfo', this.memberData);
          })
          .catch(err => {
            console.log(err);
          })
      }
    },
    created() {
      this.id = this.$store.state.member.mem_id;
      this.getData();
      this.$emit('emit-title',this.title);
    }
  }
  </script>