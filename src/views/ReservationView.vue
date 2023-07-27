<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <main class="reservation_wrap">
    <div class="about_circle_top">
        <div></div>
      </div>
      <div class="about_circle_middle">
        <div></div>
      </div>
      <div class="about_circle_bottom">
        <div></div>
      </div>
  
  <div class="reservation">
   
   

    
    <section class="reservation_read">
      
      <h2><span>1</span> 閱讀預約需知</h2>
      <div class="reservation_read_rules">
        <ul>
          <li>
            <img :src="require('@/assets/images/reservation/Vector.svg')" class="reservation_rules_img" />
            為利於其餘客戶權益，每次預約僅保留30分鐘，逾時未到視同放棄，
            如需取消預約，請於1日前取消。
          </li>
          <li>
            <img :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img" />系統僅提供座位消費金額作為參考，實際消費金額將以當日使用情況為主，最終金額可能因餐點選擇、特殊要求或其他因素而有所變動。
          </li>
          <li>
            <img :src="require('@/assets/images/reservation/Vector.svg')" class="reservation_rules_img" />目前線上付款僅提供扣除儲值金。
          </li>
          <li>
            <img :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img" />我司將不會以簡訊方式另行通知，如有疑慮，請撥打聯絡電話。
          </li>
          <li>
            <img :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img" />我司保有最終修改、變更、活動解釋及取消本活動之權利，若有相關異動將會公告於網站，
            恕不另行通知。
          </li>
          <li>
            <img :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img" />座位區預約上限5位，包廂區預約上限2間。
          </li>
          <li>
          <img :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img" />
         如需取消預約，請於1日前取消。</li>
          <li>
            <img :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img" />系統僅提供座位消費金額作為參考，實際消費金額將以當日使用情況為主，最終金額可能因餐點選擇、特殊要求或其他因素而有所變動。
          </li>
          <li>
            <img :src="require('@/assets/images/reservation/Vector.svg')" class="reservation_rules_img" />目前線上付款僅提供扣除儲值金。
          </li>
          <li>
            <img :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img" />我司將不會以簡訊方式另行通知，如有疑慮，請撥打聯絡電話。
          </li>
          <li>
            <img :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img" />我司保有最終修改、變更、活動解釋及取消本活動之權利，若有相關異動將會公告於網站，
            恕不另行通知。
          </li>
          <li>
            <img :src="require('@/assets/images/reservation/Vector.svg')"
              class="reservation_rules_img" />座位區預約上限5位，包廂區預約上限2間。
          </li>
        </ul>
      </div>
    </section>

    <section class="reservation_date">
  
      <h2><span>2</span> 選擇日期及時間</h2>
      <Date @convert-date="dateConvert" @convert-time="timeConvert"></Date>
    </section>

    <section class="reservation_seat">
      <h2><span>3</span> 選擇座位</h2>
      <div class="reservation_all_seat">
        <main class="tabs">
          <div class="tabs_list">
            <div class="seat_tabs_item" v-for="(item, key) in tabItems" :class="{ active: key == tabActive }"
              @click="updateTab(key)" :key="item.key">
              {{ item }}
            </div>
          </div>
          <div v-if="tabActive == 1" class="reservation_hall_seat">
            <div class="reservation_eSports_seat">
              <button class="seat_btn eSports_seat" v-for="item in seats_a" :key="item.no" :class="`state-${item.state}`">
                <div class="content">
                  <h4 class="text" @click.prevent="seatSelected(item)">
                    {{ item.area }} <br />
                    {{ item.no }}
                  </h4>
                  <img class="chair" src="../assets/images/reservation/chair.svg" alt="" />
                  <!-- NOTE RWD手機板時只有顯示椅子圖，780px以上時跳轉成座位編號 -->
                </div>
              </button>
            </div>
            <div class="reservation_general_seat">
              <button class="seat_btn general_seat" v-for="item in seats_b" :key="item.no" :class="`state-${item.state}`">
                <div class="content">
                  <h4 @click.prevent="seatSelected(item)">
                    {{ item.area }} <br />
                    {{ item.no }}
                  </h4>
                  <img class="chair" src="../assets/images/reservation/chair.svg" alt="" />
                  <!-- NOTE RWD手機板時只有顯示椅子圖，780px以上時跳轉成座位編號 -->
                </div>
              </button>
              <div class="counter">
                <p>櫃台</p>
              </div>
            </div>
          </div>
          <div v-if="tabActive == 2" class="reservation_booth_seat">
            <div class="reservation_single_seat">
              <button class="seat_btn single_seat" v-for="item in seats_c" :key="item.no" :class="`state-${item.state}`">
                <div class="content">
                  <h4 class="text" @click.prevent="seatSelected(item)">
                    {{ item.area }} <br />
                    {{ item.no }}
                  </h4>
                  <img class="chair" src="../assets/images/reservation/chair.svg" alt="" />
                  <!-- NOTE RWD手機板時只有顯示椅子圖，780px以上時跳轉成座位編號 -->
                </div>
              </button>
            </div>
            <div class="reservation_double_seat">
              <button class="seat_btn double_seat" v-for="item in seats_d" :key="item.no" :class="`state-${item.state}`">
                <div class="content">
                  <h4 @click.prevent="seatSelected(item)">
                    {{ item.area }} <br />
                    {{ item.no }}
                  </h4>
                  <img class="chair" src="../assets/images/reservation/double_chair.svg" alt="" />
                  <!-- NOTE RWD手機板時只有顯示椅子圖，780px以上時跳轉成座位編號 -->
                </div>
              </button>
            </div>
          </div>
        </main>
        <div class="seat_color_comment">
          <div class="color_seSports_single_seat_group">
            <div class="color_seSports_single_seat"></div>
            <p class="p_seSports_seat">A_大廳電競區<br />C_包廂單人房</p>
          </div>

          <div class="color_general_double_seat_group">
            <div class="color_general_double_seat"></div>
            <p class="p_general_seat">B_大廳一般區<br />D_包廂雙人房</p>
          </div>
          <div class="color_state_seat_group">
            <div class="color_vacancy_seat_group">
              <div class="color_G_vacancy_seat"></div>
              <div class="color_B_vacancy_seat"></div>
              <p class="p_vacancy_seat">空位</p>
            </div>
            <div class="color_use_seat_group">
              <div class="color_G_use_seat"></div>
              <div class="color_B_use_seat"></div>
              <p class="p_use_seat">使用中</p>
            </div>
            <div class="color_reserve_seat_group">
              <div class="color_reserve_seat"></div>
              <p class="p_reserve_seat">預約中</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="reservation_confirm">
      <h2><span>4</span> 確認預約細項</h2>
      <div class="reservation_confirm_data">
        <div class="confirm_data_time">
          <div class="data_time_start">
            <p>預約開始時間

            </p>
            <input type="text" readonly :value="`${reservation.startDate}  ${reservation.startTime}`" />
          </div>
          <div class="data_time_end">
            <p>預約結束時間</p>
            <input type="text" readonly :value="`${reservation.startDate}  ${reservation.endTime}`" />
          </div>
          <div class="data_time_sum">
            <p>金額總計</p>
            <input type="text" readonly :value="`${reservation.price}元`" />
          </div>
          <div class="data_time_stored">
            <p>目前儲值金</p>
            <input type="text" readonly value="元" />
            <div class="stored_error">
              儲值金不足，請先至 <a @click="this.$router.push('/member_center/member_nav')">會員中心</a> 儲值。
            </div>
          </div>
        </div>

        <div class="confirm_data_seat">
          <p>選定座位</p>
          <div class="data_seat">
            <div class="data_seat_info" v-for="item in selected" :key="item">

              {{ item }}
            </div>

          </div>
        </div>
      </div>
      <button class="reservation_submit" @click="confirmReserve">確認預約</button>
    </section>
  
  </div>
</main>
  <div></div>
</template>



<script>

import PageTitle from '@/components/PageTitle.vue';
import Date from '@/components/reservation/Date.vue';
import axios from 'axios';

import { seat_a, seat_b, seat_c, seat_d } from "@/assets/js/seatinfo.js";

export default {
  components: {
    PageTitle,
    Date
  },

  data() {
    return {
      title: "訂位預約",
      reservation: {
        startDate: "",
        startTime: "",
        endTime: "",
        seat: [],
        price: 0
      },
      seats_a: seat_a,
      seats_b: seat_b,
      seats_c: seat_c,
      seats_d: seat_d,
      tabActive: 1,
      tabItems: {
        1: "大廳區",
        2: "包廂區"
      },
      selectedArea: "",
      selectedAreaWord: "",
      selectedSeat: "",
      selected: [],
      seatData:[],
    };
  },

  methods: {
    // 切換tab
    updateTab(index) {
      this.tabActive = index;
    },
    //轉換日期
    dateConvert(date) {
      this.reservation.startDate = date.toString().substr(4, 11);
    },
    //轉換時間
    timeConvert(time) {
      this.reservation.startTime = time.toString().substr(0, 5);
      this.reservation.endTime = time.toString().substr(9, 5);

      let a = +time.toString().substr(0, 2);
      let b = +time.toString().substr(9, 2);


    },

    seatSelected(item) {

      if (this.reservation.seat.indexOf(item.area + item.no) === -1 && this.selected.length <= 7) {
        if (+item.state === 0) {
          if (this.tabActive === 1) {
            this.selectedArea = item.area === "A" ? "A" : "B";
            this.selectedSeat = item.no;
          } else {
            this.selectedArea = item.area === "C" ? "C" : "D";
            this.selectedSeat = item.no;
          }

        } else {
          return
        }
      } else {
        return
      }

      this.reservation.seat.push(this.selectedArea + this.selectedSeat)

      this.selectedAreaWord = this.selectedArea === 'A' ? '大廳電競' : this.selectedArea === 'B' ? '大廳一般' : this.selectedArea === 'C' ? '包廂單人' : '包廂雙人';

      this.selected.push(this.selectedAreaWord + this.selectedArea + '-' + this.selectedSeat);

      
    },
    confirmReserve(){
      alert('預約成功');
    },

    fetchSeatData(){
      axios.get('data/seat_reservation.json')
      .then((res) => {
        this.seatData = res.data;
      })
      .catch((err) => {
        console.log(err);
      })
    }
  },
  computed: {



  },
  watch: {

  },
  created(){
   
this.fetchSeatData()

  }
};
</script>
