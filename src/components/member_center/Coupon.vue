<template>
    <MbForm @emit-back="triggerParent">
      <template v-slot:mb_form_title>
        <h3>{{ title }}</h3>
      </template>
      <template v-slot:mb_content>
        <div class="coupon_container">
          <div class="member_coupon" v-for="coupon in coupons" :key="coupon.id">
            <div class="coupon_title">
              <!-- <img :src="require(`@/assets/images/member/${coupon.pic}`)" alt=""> -->
              <Images :imgURL="`/images/${coupon.pic}`" :alt="`${coupon.coupon_id}`"/>
              &nbsp;<p v-if="coupon.exchange_food">{{ coupon.exchange_food }}</p>
              <p v-else>{{ coupon.exchange_time }}</p>
            </div>
            <p>到期日: {{ coupon.close_date}}</p>
            <p>優惠序號: {{ coupon.member_coupon_no }}</p>
            <div class="exchange_container" v-show="coupon.exchange == '0'">
              <img src="@/assets/images/member/exchange.png" alt="">
            </div>
          </div>
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
        title: '優惠券',
        date: null,
        coupons: [],
      }
    },
    computed: {

    },
    methods: {
      triggerParent() {
        this.$emit('emit-title','');
      },
      getData() {
        const params = {
          id: this.$store.state.member.mem_id
        }
        this.axios.get(`${this.$URL}/getCoupon.php`,{ params: params })
          .then(res => {
            console.log(res);
            this.coupons = res.data;
          })
          .catch(err => {
            console.log(err);
          })
      }
    },
    created() {
      this.$emit('emit-title',this.title);
      this.getData();
    },
  }
  </script>