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
        <h2 class="reservation_text"><span>1</span> 閱讀預約需知</h2>
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
              <img :src="require('@/assets/images/reservation/Vector.svg')"
                class="reservation_rules_img" />目前線上付款僅提供扣除儲值金。
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
              <img :src="require('@/assets/images/reservation/Vector.svg')" class="reservation_rules_img" />
              如需取消預約，請於1日前取消。
            </li>
            <li>
              <img :src="require('@/assets/images/reservation/Vector.svg')"
                class="reservation_rules_img" />系統僅提供座位消費金額作為參考，實際消費金額將以當日使用情況為主，最終金額可能因餐點選擇、特殊要求或其他因素而有所變動。
            </li>
            <li>
              <img :src="require('@/assets/images/reservation/Vector.svg')"
                class="reservation_rules_img" />目前線上付款僅提供扣除儲值金。
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
        <button class="reservation_submit" @click="checkLogin" v-show="!login">
          立即登入預約
        </button>
      </section>

      <!-- 座位先開啟 -->
      <section class="reservation_info">
        <section class="reservation_choose">
          <!-- <section class="reservation_date" v-show="login"> -->
          <section class="reservation_date">
            <h2 class="reservation_text">
              <span>2</span> 選擇日期、時間及座位
            </h2>
            <Date @convert-date="dateConvert" @convert-time="timeConvert"></Date>
          </section>
          <section class="reservation_seat">
            <!-- <h2 class="reservation_text"><span>3</span> 選擇座位</h2> -->
            <div class="reservation_all_seat">
              <main class="tabs">
                <div class="tabs_list">
                  <div class="seat_tabs_item" v-for="(item, key) in tabItems" :class="{ active: key == tabActive }"
                    @click="updateTab(key)" :key="item.key">
                    {{ item }}
                  </div>
                </div>
                <div class="color_state_seat_group">
                  <div class="color_vacancy_seat_group">
                    <div class="color_G_vacancy_seat"></div>
                    <p class="p_vacancy_seat">可預約</p>
                  </div>
                  <div class="color_use_seat_group">
                    <div class="color_G_use_seat"></div>
                    <p class="p_use_seat">不可預約</p>
                  </div>
                </div>
                <div v-if="tabActive == 1" class="reservation_hall_seat">
                  <div class="reservation_eSports_seat">
                    <div class="eSports_seat_title">
                      <p>電競區</p>
                    </div>
                    <button class="seat_btn eSports_seat" v-for="item in seats_a" :key="item.no"
                      :class="`state-${item.state}`">
                      <div class="content">
                        <h4 class="text" @click.prevent="seatSelected(item)">
                          {{ item.seat_area }} <br />
                          {{ item.seat_no }}
                        </h4>
                        <img class="chair" src="../assets/images/reservation/chair.svg" alt="" />
                        <!-- NOTE RWD手機板時只有顯示椅子圖，780px以上時跳轉成座位編號 -->
                      </div>
                    </button>
                  </div>
                  <div class="reservation_general_seat">
                    <div class="general_seat_title">
                      <p>一般區</p>
                    </div>
                    <button class="seat_btn general_seat" v-for="item in seats_b" :key="item.no"
                      :class="`state-${item.state}`">
                      <div class="content" @click.prevent="seatSelected(item)">
                        <h4>
                          {{ item.seat_area }} <br />
                          {{ item.seat_no }}
                        </h4>
                        <img class="chair" src="../assets/images/reservation/chair.svg" alt="" />
                        <!-- NOTE RWD手機板時只有顯示椅子圖，780px以上時跳轉成座位編號 -->
                      </div>
                    </button>
                    <!-- <button
                      :class="
                        ({
                          seat_btn: true,
                          general_seat: true,
                          selected: isSelected
                        },
                        `state-${item.state}`)
                      "
                      v-for="item in seats_b"
                      :key="item.no"
                    >
                      <div class="content">
                        <h4 @click.prevent="seatSelected(item)">
                          {{ item.area }} <br />
                          {{ item.no }}
                        </h4>
                        <img
                          class="chair"
                          src="../assets/images/reservation/chair.svg"
                          alt=""
                        />
                         NOTE RWD手機板時只有顯示椅子圖，780px以上時跳轉成座位編號
                      </div>
                    </button> -->
                    <div class="counter">
                      <p>櫃台</p>
                    </div>
                  </div>
                </div>
                <div v-if="tabActive == 2" class="reservation_booth_seat">
                  <div class="booth_seat_title">
                    <div class="single_seat_title">
                      <p>單人包廂</p>
                    </div>
                    <div class="double_seat_title">
                      <p>雙人包廂</p>
                    </div>
                  </div>
                  <div class="reservation_single_seat">
                    <button class="seat_btn single_seat" v-for="item in seats_c" :key="item.no"
                      :class="`state-${item.state}`">
                      <div class="content">
                        <h4 class="text" @click.prevent="seatSelected(item)">
                          {{ item.area }}{{ item.seat_no }}
                        </h4>
                        <img class="chair" src="../assets/images/reservation/chair.svg" alt="" />
                        <!-- NOTE RWD手機板時只有顯示椅子圖，780px以上時跳轉成座位編號 -->
                      </div>
                    </button>
                  </div>
                  <div class="reservation_double_seat">
                    <button class="seat_btn double_seat" v-for="item in seats_d" :key="item.no"
                      :class="`state-${item.state}`">
                      <div class="content">
                        <h4 @click.prevent="seatSelected(item)">
                          {{ item.seat_area }}{{ item.no }}
                        </h4>
                        <img class="chair" src="../assets/images/reservation/double_chair.svg" alt="" />
                        <!-- NOTE RWD手機板時只有顯示椅子圖，780px以上時跳轉成座位編號 -->
                      </div>
                    </button>
                  </div>
                </div>
              </main>
            </div>
          </section>
        </section>
        <!-- 確認先開啟 -->
        <section class="reservation_confirm">
          <h2 class="reservation_text">
            <!-- <span>4</span> {{ seatData[0] }}確認預約細項 -->
            <span>3</span>確認預約細項
          </h2>
          <div class="reservation_confirm_data">
            <div class="confirm_data_time">
              <div class="data_time_start">
                <p>預約開始時間</p>
                <input type="text" readonly :value="`${reservation.startDate}  ${reservation.startTime}`" />
              </div>
              <div class="data_time_end">
                <p>預約結束時間</p>
                <input type="text" readonly :value="`${reservation.startDate}  ${reservation.endTime}`" />
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
            <div class="data_time_sum">
              <p>金額總計</p>
              <input type="text" readonly :value="`${reservation.price}元`" />
            </div>
            <div class="data_time_stored">
              <p>目前儲值金</p>
              <input type="text" readonly value="元" />
              <div class="stored_error">
                儲值金不足，請先至
                <a @click="this.$router.push('/member_center/member_nav')">會員中心</a>
                儲值。
              </div>
            </div>
            <button class="reservation_submit" @click="confirmReserve">
              確認預約
            </button>
          </div>
        </section>
      </section>
    </div>
  </main>
  <!-- 預約成功彈窗 -->
  <div class="reservation_modal" v-show="modalSwitch">
    <div class="modal">
      <div class="pic">
        <img src="@/assets/images/member/modal.svg" alt="" />
      </div>
      <div class="bind_success">
        <span>預約成功！</span>
        <button @click="goReservation">確定</button>
      </div>
    </div>
  </div>
</template>

<script>
import PageTitle from "@/components/PageTitle.vue";
import Date from "@/components/reservation/Date.vue";
import axios from "axios";
import { mapMutations, mapActions, mapGetters, mapState } from "vuex";
import { seat_a, seat_b, seat_c, seat_d } from "@/assets/js/seatinfo.js";

export default {
  components: {
    PageTitle,
    Date,
  },

  data() {
    return {
      title: "訂位預約",
      reservation: {
        startDate: "",
        startTime: "",
        endTime: "",
        seat: [],
        price: 0,
        selectedSeat: [],
        id: '',
        area: '',
        no: '',
        sal: ''
      },
      seats_a: [],
      seats_b: [],
      seats_c: [],
      seats_d: [],
      // seats_a: seat_a,
      // seats_b: seat_b,
      // seats_c: seat_c,
      // seats_d: seat_d,
      tabActive: 1,
      tabItems: {
        1: "大廳區",
        2: "包廂區"
      },
      selectedArea: "",
      selectedAreaWord: "",
      selected: [],
      seatData: [],
      modalSwitch: false,
    };
  },

  methods: {
    ...mapMutations(["toggleLogin", "toggleForgotPsw", 'toggleRegister']),

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

      console.log(item);
      let { seat_id, seat_area, seat_no, seat_sal } = item;
      console.log(seat_id, seat_area, seat_no, seat_sal);


      

      //如果選的陣列中沒有重複和數量<7
      // if (this.reservation.selectedSeat.indexOf(index) === -1 &&
      // this.reservation.selectedSeat.length < 7){
      //     this.reservation.selectedSeat.push(this.seatData[index]);
      // } else {
      //   return;
      // }


      // if (
      //   this.reservation.seat.indexOf(item.area + item.no) === -1 &&
      //   this.selected.length < 7
      // ) {
      //   if (+item.state === 0) {
      //     if (this.tabActive === 1) {
      //       this.selectedArea = item.area === "A" ? "A" : "B";
      //       this.selectedSeat = item.no;
      //     } else {
      //       this.selectedArea = item.area === "C" ? "C" : "D";
      //       this.selectedSeat = item.no;
      //     }
      //   } else {
      //     return;
      //   }
      //   this.reservation.seat.push(this.selectedArea + this.selectedSeat);
      // } else {
      //   return;
      // }
      // this.selectedAreaWord =
      //   this.selectedArea === "A"
      //     ? "大廳電競"
      //     : this.selectedArea === "B"
      //       ? "大廳一般"
      //       : this.selectedArea === "C"
      //         ? "包廂單人"
      //         : "包廂雙人";

      // this.selected.push(
      //   this.selectedAreaWord + this.selectedArea + "-" + this.selectedSeat
      // );
    },
    confirmReserve() {
      this.modalSwitch = true;
    },

    fetchSeatData() {
      axios
        .get("data/seat.json")
        .then((res) => {
          this.seatData = res.data;
          this.seats_a = this.seatData.filter(item => item.seat_id <= 30);
          this.seats_b = this.seatData.filter(item => 31 <= item.seat_id && item.seat_id <= 55);
          this.seats_c = this.seatData.filter(item => 56 <= item.seat_id && item.seat_id <= 65);
          this.seats_d = this.seatData.filter(item => 66 <= item.seat_id && item.seat_id <= 71);
        })
        .catch((err) => {
          console.log(err);
        });

    },
    checkLogin() {
      if (!this.login) {
        this.toggleLogin()
      } else {
        return;
      }
    },
    goReservation() {
      this.$router.push('/member_center/member_seat_reservation');
      this.modalSwitch = false;
    }
  },
  computed: {
    // isSelected() {
    //   return this.seat_b.includes(this.seatNumber);
    // },
    convertWord() {

      return this.selectedSeat
    }

  },
  watch: {},
  created() {
    this.fetchSeatData();
  },
};
</script>

<style lang="scss" scoped>
.reservation_modal {
  width: 100%;
  height: 100%;
  position: fixed;
  inset: 0 0 0 0;
  z-index: 1200;
  background-color: rgb(255, 255, 255, 0.8);

  .modal {
    width: 30%;
    background-color: #fff;
    border-radius: 10px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    padding: 30px;
    box-shadow: 0 0 2px #aaa;

    .pic {
      width: 50%;
      margin: 0 auto 20px;

      img {
        width: 100%;
        height: 100%;
      }
    }
  }
}

@media screen and (max-width:767px) {
  .reservation_modal {
    .modal {
      width: 60%;
    }
  }
}
</style>