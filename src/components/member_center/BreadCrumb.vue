<template>
  <div class="member_bread_crumb">
    <div>
      <router-link to="/">首頁 /</router-link>
      <router-link to="/member_center/member_nav" @click="this.$emit('emit-title')"> 會員中心</router-link>
      <slot name="third_nav"></slot>
    </div>
    <button type="button" @click.prevent="loginClose">登出</button>
  </div>
</template>
<script>
import { mapMutations, mapActions, mapGetters, mapState } from "vuex";
export default {
  data() {
    return {

    }
  },
  methods: {
    ...mapMutations(['loginOut']),
    loginClose(){
      this.loginOut();
      this.$router.push('/index');
    }
  },
    computed: {
    ...mapState(['isLoginOpen","forgotPsw', 'member', 'isRegister', 'login', 'member']),
  },
  
}
</script>