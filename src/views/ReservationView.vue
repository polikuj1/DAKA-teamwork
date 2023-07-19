<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <main class="reservation">
    <section class="reservation_read">
      <h2><span>1</span> 閱讀預約需知</h2>
      <div class="reservation_read_rules">
        <ul>
          <li>
            <img
              :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img"
            />
            為利於其餘客戶權益，每次預約僅保留30分鐘，逾時未到視同放棄，
            如需取消預約，請於1日前取消。
          </li>
          <li>
            <img
              :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img"
            />系統僅提供座位消費金額作為參考，實際消費金額將以當日使用情況為主，最終金額可能因餐點選擇、特殊要求或其他因素而有所變動。
          </li>
          <li>
            <img
              :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img"
            />目前線上付款僅提供扣除儲值金。
          </li>
          <li>
            <img
              :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img"
            />我司將不會以簡訊方式另行通知，如有疑慮，請撥打聯絡電話。
          </li>
          <li>
            <img
              :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img"
            />我司保有最終修改、變更、活動解釋及取消本活動之權利，若有相關異動將會公告於網站，
            恕不另行通知。
          </li>
          <li>
            <img
              :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img"
            />座位區預約上限5位，包廂區預約上限2間。
          </li>
          <li> 如需取消預約，請於1日前取消。</li>
          <li><img :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img">系統僅提供座位消費金額作為參考，實際消費金額將以當日使用情況為主，最終金額可能因餐點選擇、特殊要求或其他因素而有所變動。</li>
          <li><img :src="require('@/assets/images/reservation/Vector.svg')" class="reservation_rules_img">目前線上付款僅提供扣除儲值金。
          </li>
          <li><img :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img">我司將不會以簡訊方式另行通知，如有疑慮，請撥打聯絡電話。</li>
          <li><img :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img">我司保有最終修改、變更、活動解釋及取消本活動之權利，若有相關異動將會公告於網站， 恕不另行通知。</li>
          <li><img :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img">座位區預約上限5位，包廂區預約上限2間。</li>
        </ul>
      </div>
    </section>

    <section class="reservation_date">
      <h2><span>2</span> 選擇日期及時間</h2>
    </section>

    <section class="reservation_seat">
      <h2><span>3</span> 選擇座位</h2>
      <div class="reservation_hallseat">
        <div class="reservation_eSports_seat">
          <div class="seat_btn" v-for="item in seats_a" :key="item.no" :class="`state-${item.state}`">
            <div class="txt">
              <div class="title">
                <h4>{{ item.area }} <br> {{ item.no }}</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="reservation_general_seat">
          <div class="seat_btn" v-for="item in seats_b" :key="item.no">
            <div class="txt">
              <div class="title">
                <h4>{{ item.area }} <br> {{ item.no }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <h2> <span>2</span> 選擇日期及時間</h2>
      <Date @convert-date="dateConvert" @convert-time="timeConvert"></Date>
    </section>


    <section class="reservation_confirm">
      <h2>
        <span>4</span> 確認預約細項
      </h2>
      <div class="reservation_confirm_data">
        <div class="confirm_data_time">
          <div class="data_time_start">

            <p >預約開始時間</p>
            <input type="text" readonly :value="`${reservation.startDate}  ${reservation.startTime}`">
          </div>
          <div class="data_time_end">

            <p >預約結束時間</p>
            <input type="text" readonly :value="`${reservation.startDate}  ${reservation.endTime}`">
          </div>
          <div class="data_time_sum">

            <p  >金額總計</p>
            <input type="text" readonly :value="`${reservation.price}元`">
          </div>
          <div class="data_time_stored">

            <p >目前儲值金</p>
            <input type="text" readonly value="元">
            <div class="stored_error">儲值金不足，請先至 <a href="">會員中心</a>
              儲值。</div>
          </div>
        </div>

        <div class="confirm_data_seat">
          <p >選定座位</p>
          <input type="text" readonly>

        </div>

      </div>
      <button class="reservation_submit">確認預約</button>
    </section>

  </main>

  <div></div>
</template>
<style>
@import "@/assets/scss/page/reservation.scss";
</style>






<script>
import PageTitle from '@/components/PageTitle.vue';
import Date from '@/components/reservation/Date.vue';
import '@/assets/scss/page/reservation.scss';
  import { seat_a, seat_b } from "@/assets/js/seatinfo.js";

export default {

  components: {
    PageTitle, Date
  },
    
  data() {
    

    return {
      title: '訂位預約',
      reservation: {
        startDate: '',
        startTime:'',
        endTime:'',
        seat:[],
        price:0
      },
      seats_a:seat_a,
      seats_b:seat_b,
      title: "訂位預約"


    }
  },
  methods: {

    //轉換日期
    dateConvert(date) {
      this.reservation.startDate = date.toString().substr(4,11);
    },
    //轉換時間
    timeConvert(time) {
      this.reservation.startTime = time.toString().substr(0,5);
      this.reservation.endTime = time.toString().substr(9,5);

      let a =+(time.toString().substr(0,2));
      let b=+(time.toString().substr(9,2));
      console.log(a,b,typeof(a),typeof(b));
     

      

        this.reservation.price=(b-a)*20;
      

    }
  },
  computed: {

  },
}

</script>
