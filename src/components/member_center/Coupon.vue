<template>
    <MbForm @emit-back="triggerParent">
      <template v-slot:mb_form_title>
        <h3>{{ title }}</h3>
      </template>
      <template v-slot:mb_content>
        <div class="coupon_container">
          <div class="member_coupon" v-for="coupon in coupons" :key="coupon.id">
            <div class="coupon_title">
              <img :src="coupon.image" alt="">
              &nbsp;<p>{{ coupon.title }}</p>
            </div>
            <p>到期日: {{ coupon.expirationDate }}</p>
            <p>優惠序號: {{ coupon.couponCode }}</p>
            <div class="exchange_container">
              <img v-if="coupon.exchange" src="@/assets/images/member/exchange.png" alt="">
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
        coupons: [
        {
          id: 1,
          image: require("@/assets/images/member/fried_chicken_coupon.png"),
          title: "鮮嫩多汁炸雞腿一隻",
          expirationDate: "2024/12/31",
          couponCode: "ABC123",
        },
        {
          id: 2,
          image: require("@/assets/images/member/takoyaki_coupon.png"),
          title: "外酥內嫩章魚燒三球",
          expirationDate: "2024/03/15",
          couponCode: "DEF456",
          
        },
        {
          id: 3,
          image: require("@/assets/images/member/coupon.png"),
          title: "不多不少座位一小時",
          expirationDate: "2024/05/15",
          couponCode: "ABC333",
          exchange: true,
        },
        {
          id: 4,
          image: require("@/assets/images/member/coupon.png"),
          title: "不多不少座位一小時",
          expirationDate: "2024/06/15",
          couponCode: "ABC666",
          
        },
        {
          id: 5,
          image: require("@/assets/images/member/coupon.png"),
          title: "不多不少座位一小時",
          expirationDate: "2024/09/15",
          couponCode: "DEF777",
        },
      ],
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