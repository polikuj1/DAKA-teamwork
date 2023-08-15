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
            <div class="exchange_container" v-show="coupon.exchange === 0">
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
        coupons: [
        {
          id: 1,
          image: require("@/assets/images/member/fried_chicken_coupon.png"),
          title: "鮮嫩多汁炸雞腿一隻",
          expirationDate: "2024/12/31",
          couponCode: "ABC123",
          exchange:false,
        },
        {
          id: 2,
          image: require("@/assets/images/member/takoyaki_coupon.png"),
          title: "外酥內嫩章魚燒三球",
          expirationDate: "2024/03/15",
          couponCode: "DEF456",
          exchange:true,
          
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
          exchange:false,
          
        },
        {
          id: 5,
          image: require("@/assets/images/member/coupon.png"),
          title: "不多不少座位一小時",
          expirationDate: "2024/09/15",
          couponCode: "DEF777",
          exchange:false,
        },
        ],
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