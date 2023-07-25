<template>
  <MbForm @emit-back="triggerParent">
    <template v-slot:mb_form_title>
      <h3>{{ title }}</h3>
    </template>
    <template v-slot:mb_content>
      <div class="order_wrap" v-for="record in reservation" :key="record.reservation_no">
        <span>訂單編號 {{ record.reservation_no }}</span>
        <div class="order_detail">
          <ul class="box">
            <li>
              <span>訂單狀態</span>
              <span>{{ record.order_status }}</span>
            </li>
            <li>
              <span>預約日期</span>
              <span>{{ record.reservation_date }}</span>
            </li>
            <li>
              <span>取書日期</span>
              <span>{{ record.get_book_date }}</span>
            </li>
          </ul>
          <ul class="box">
            <li>
              <span>應還日期</span>
              <span>{{ record.should_return_date }}</span>
            </li>
            <li>
              <span>歸還日期</span>
              <span>{{ record.return_date }}</span>
            </li>
            <li>
              <span>罰金</span>
              <span>NTD$ {{ record.fine }}</span>
            </li>
          </ul>
          <ul class="box">
            <li>
              <span>書籍數量</span>
              <span>{{ record.book_count }}</span>
            </li>
            <li>
              <span>消費金額</span>
              <span>NTD$ {{ record.price_total }}</span>
            </li>
            <li>
              <span>付款方式</span>
              <span>{{ record.payment }}</span>
            </li>
          </ul>
        </div>
        <div class="book_detail">
          <nav>
            <input type="checkbox" name="" :id="record.reservation_no">
            <div class="top_nav">
              <label :for="record.reservation_no">書籍明細</label>
              <span>取消預約</span>
            </div>
            <table>
              <thead>
                <tr>
                  <th>書籍編碼</th>
                  <th>漫畫名稱</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ record.book_detail[0].book_no }}</td>
                  <td>{{ record.book_detail[0].book_name }}</td>
                </tr>
                <tr>
                  <td>{{ record.book_detail[1].book_no }}</td>
                  <td>{{ record.book_detail[1].book_name }}</td>
                </tr>
              </tbody>
            </table>
          </nav>
        </div>
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
      title: '書籍租借紀錄',
      reservation: [],
    }
  },
  methods: {
    triggerParent() {
      this.$emit('emit-title','');
    }
  },
  created() {
    this.$emit('emit-title',this.title);
    this.axios.get('/data/book_reservation.json')
    .then((res) => {
      this.reservation = res.data;
    })
    .catch((err) => {
      console.log(err);
    })
  },
}
</script>