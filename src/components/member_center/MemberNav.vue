<template>
  <div class="member_nav">
    <div class="nav_card" v-for="card in nav_content" :key="card.title">
      <h3>{{ card.title }}</h3>
      <ol>
        <li><router-link :to="card.list[1]">{{ card.list[0] }}</router-link></li>
        <li v-show="card.list_one[0]"><router-link :to="card.list_one[1]">{{ card.list_one[0] }}</router-link></li>
        <li v-show="card.list_two[0]"><router-link :to="card.list_two[1]">{{ card.list_two[0] }}</router-link></li>
      </ol>
    </div>
  </div>
</template>
<script>
export default {
  components: {

  },
  data() {
    return {
      nav_content: [
        {
          title: '會員資料管理',
          list: ['個人資料編輯', '/member_center/member_edit'],
          list_one: ['線上儲值', '/member_center/member_add_value'],
          list_two: ['付款方式', '/member_center/member_bind_credit'],
        },
        {
          title: '交易紀錄',
          list: ['儲值金交易紀錄', '/member_center/member_value_record'],
          list_one: ['座位預約紀錄', '/member_center/member_seat_reservation'],
          list_two: ['書籍租借紀錄', '/member_center'],
        },
        {
          title: '優惠序號管理',
          list: ['優惠序號清單', '/member_center/member_coupon'],
          list_one: ['', ''],
          list_two: ['', ''],
        },
      ],
    }
  },
}
</script>