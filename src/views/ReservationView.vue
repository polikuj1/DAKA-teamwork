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
                class="reservation_rules_img" /><span>座位區預約上限5位，包廂區預約上限2間。</span>
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
            <DateComponent @convert-date="dateConvert" @convert-time="timeConvert"></DateComponent>
          </section>
          <section class="reservation_seat">
            <!-- <h2 class="reservation_text"><span>3</span> 選擇座位</h2> -->
            <div class="reservation_all_seat">
              <main class="tabs">
                <div class="tabs_list">
                  <div class="seat_tabs_item" v-for="(item, key) in tabItems" :class="{ active: key == tabActive }"
                    @click="updateTab(key)" :key="item.key">
                    {{ item }}
                    <!-- split再slice去判斷，寫在div裡面 -->
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
                    <!-- a[0].seat_status.split('').slice(0,3).includes('0') -->
                    <!-- `state-${item.state}`判定座位狀態 -->
                    <button v-for=" item in seats_a" :key="item.no" :class="{
                      seat_btn: true,
                      eSports_seat: true,
                      selected: selectedSeats.some(seat => seat.seat_id === item.seat_id),
                      [`state-${item.seat_status?.split('').slice((+reservation.startTimeNum), (+reservation.endTimeNum)).includes('1') ? 1 : 0}`]: true
                    }" @click.prevent="seatSelected(item)" :disabled="isButtonDisabled" >
                      <div class="content">
                        <h4 class="text">
                          {{ item.seat_area }} <br />
                          {{ item.seat_id }}
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
                    <!--狀態管理 :class="`state-${item.state}`" -->
                    <button :class="{
                      seat_btn: true,
                      eSports_seat: true,
                      selected: selectedSeats.some(seat => seat.seat_id === item.seat_id),
                      [`state-${item.seat_status?.split('').slice((+reservation.startTimeNum), (+reservation.endTimeNum)).includes('1') ? 1 : 0}`]: true
                    }" v-for="item in seats_b" :key="item.no" @click.prevent="seatSelected(item)" :disabled="isButtonDisabled">
                      <div class="content">
                        <h4>
                          {{ item.seat_area }} <br />
                          {{ item.seat_number }}
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
                  <div class="booth_seat_title">
                    <div class="single_seat_title">
                      <p>單人包廂</p>
                    </div>
                    <div class="double_seat_title">
                      <p>雙人包廂</p>
                    </div>
                  </div>
                  <!--狀態管理 :class="`state-${item.state}`" -->
                  <div class="reservation_single_seat">
                    <button
                      :class="{ seat_btn: true, single_seat: true, selected: selectedSeats.some(seat => seat.seat_id === item.seat_id), [`state-${item.seat_status?.split('').slice((+reservation.startTimeNum), (+reservation.endTimeNum)).includes('1') ? 1 : 0}`]: true }"
                      v-for="item in seats_c" :key="item.no" @click.prevent="seatSelected(item)" :disabled="isButtonDisabled">
                      <div class="content">
                        <h4 class="text">
                          {{ item.seat_area }}{{ item.seat_number }}
                        </h4>
                        <img class="chair" src="../assets/images/reservation/chair.svg" alt="" />
                        <!-- NOTE RWD手機板時只有顯示椅子圖，780px以上時跳轉成座位編號 -->
                      </div>
                    </button>
                  </div>
                  <!-- 狀態管理:class="`state-${item.state}`" -->
                  <div class="reservation_double_seat">
                    <button
                      :class="{ seat_btn: true, double_seat: true, selected: selectedSeats.some(seat => seat.seat_id === item.seat_id), [`state-${item.seat_status?.split('').slice((+reservation.startTimeNum), (+reservation.endTimeNum)).includes('1') ? 1 : 0}`]: true }"
                      v-for="item in seats_d" :key="item.no" @click.prevent="seatSelected(item)" :disabled="isButtonDisabled">
                      <div class="content">
                        <h4>
                          {{ item.seat_area }}{{ item.seat_number }}
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
                <div class="data_seat_info" v-for=" item in selectedSeats " :key="item.seat_no">
                  {{ item.seat_area === "A"
                    ? "大廳電競"
                    : item.seat_area === "B"
                      ? "大廳一般"
                      : item.seat_area === "C"
                        ? "包廂單人"
                        : "包廂雙人" }} {{ item.seat_area }}-{{ item.seat_number }}
                </div>
              </div>
            </div>
            <div class="data_time_sum">
              <p>金額總計</p>
              <input type="text" readonly :value="`${totalSal === 0 ? 0 : totalSal}元`" />
            </div>
            <div class="data_time_stored">
              <p>目前儲值金</p>
              <input type="text" readonly :value="`${member.remain == undefined ? 0 : member.remain}元`" />
              <div class="stored_error" v-show="member.remain < totalSal">
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
import DateComponent from "@/components/reservation/Date.vue";
import axios from "axios";
import { mapMutations, mapActions, mapGetters, mapState } from "vuex";
// import { seat_a, seat_b, seat_c, seat_d } from "@/assets/js/seatinfo.js";

export default {
  components: {
    PageTitle,
    DateComponent,
  },

  data() {
    return {
      isButtonDisabled: true,
      isReserveSeatVisible: false,
      isReserveUserVisible: false,
      isSeatInputsDisabled: false,
      isUserInputsDisabled: false,
      title: "訂位預約",
      reservation: {
        startDate: "",
        startTime: "",
        endTime: "",
        startTimeNum: "",
        endTimeNum: "",
      },
      seats_a: [],
      seats_b: [],
      seats_c: [],
      seats_d: [],
      tabActive: 1,
      tabItems: {
        1: "大廳區",
        2: "包廂區"
      },
      selectedArea: "",
      selectedAreaWord: "",
      selectedSeats: [],
      seatData: [],
      selectedData: [],
      selectedAandB: [],
      selectedCandD: [],
      modalSwitch: false,
      id: '',
      area: '',
      no: '',
      sal: '',
      totalSal: 0,
      totalTime: 0,
      seatLobby: [],
      seatRoom: [],
      isSelected: false,
      maxAandB: 5,
      maxCandD: 2,
      seatState: [],
      formattedDate: "",
      singleSeatState: 0,
      seatStatus: 0,
      formattedCurrentDateTime: '',

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
      console.log(this.reservation.startDate);
      this.formatDateString();

      this.checkButtonState();
    },
    //轉換時間
    timeConvert(time) {
      this.reservation.startTime = time.toString().substr(0, 5);
      this.reservation.endTime = time.toString().substr(9, 5);
      this.reservation.startTimeNum = time.toString().substr(0, 2);
      this.reservation.endTimeNum = time.toString().substr(9, 2);

      //選出相同日期的座位陣列
      const allSeatState = this.selectedData.filter((i) => i.seat_state_date === this.formattedDate);
      this.seatData = allSeatState;
      this.seats_a = this.seatData.filter(item => item.seat_id <= 30);
      this.seats_b = this.seatData.filter(item => 31 <= item.seat_id && item.seat_id <= 55);
      this.seats_c = this.seatData.filter(item => 56 <= item.seat_id && item.seat_id <= 65);
      this.seats_d = this.seatData.filter(item => 66 <= item.seat_id && item.seat_id <= 71);

      this.checkButtonState();
    },
    checkButtonState() {
        if (this.reservation.startDate && this.reservation.startTime && this.reservation.endTime) {
            this.isButtonDisabled = false;
        }
    },
    getMonthNumber(monthName) {
      const months = {
        Jan: 1, Feb: 2, Mar: 3, Apr: 4, May: 5, Jun: 6,
        Jul: 7, Aug: 8, Sep: 9, Oct: 10, Nov: 11, Dec: 12
      };
      return months[monthName];
    },
    formatDateString() {
      const dateParts = this.reservation.startDate.split(' ');
      const month = this.getMonthNumber(dateParts[0]);
      const day = parseInt(dateParts[1], 10);
      const year = parseInt(dateParts[2], 10);
      const dateObject = new Date(year, month - 1, day);

      this.formattedDate = `${dateObject.getFullYear()}-${(dateObject.getMonth() + 1).toString().padStart(2, '0')}-${dateObject.getDate().toString().padStart(2, '0')}`;
      console.log(this.formattedDate);
    },
    seatSelected(item) {
      
    
      if (
        !item.seat_status
          ?.split("")
          .slice(+this.reservation.startTimeNum, +this.reservation.endTimeNum)
          .includes("1")
      ) {
        switch (item.seat_area) {
          case "A":
          case "B":
            if (this.selectedAandB.includes(item)) {
              this.deselectSeat(this.selectedAandB, item);
            } else {
              this.selectedAandB.push(item);
            }

            if (this.selectedAandB.length > this.maxAandB) {
              this.selectedAandB.splice(0, 1);
            }
            break;
          case "C":
          case "D":
            if (this.selectedCandD.includes(item)) {
              this.deselectSeat(this.selectedCandD, item);
            } else {
              this.selectedCandD.push(item);
            }
            if (this.selectedCandD.length > this.maxCandD) {
              this.selectedCandD.splice(0, 1);
            }
            break;
        }

        // if (item.seat_area === "A" || item.seat_area === "B") {
        //   if (this.selectedAandB.includes(item)) {
        //     this.deselectSeat(this.selectedAandB, item);
        //   }else{
        //     this.selectedAandB.push(item);
        //   }

        //   if (this.selectedAandB.length > this.maxAandB) {
        //     this.selectedAandB.splice(0, 1);
        //   }
        // } else if (item.seat_area === "C" || item.seat_area === "D") {

        //   if (this.selectedCandD.includes(item)) {
        //     this.deselectSeat(this.selectedCandD, item);
        //   }else{
        //     this.selectedCandD.push(item);
        //   }
        //   if (this.selectedCandD.length > this.maxCandD) {
        //     this.selectedCandD.splice(0, 1);
        //   }
        // }
        this.selectedSeats = [...this.selectedAandB, ...this.selectedCandD];

        this.totalTime =
          +this.reservation.endTimeNum - this.reservation.startTimeNum;
        this.totalSal = this.selectedSeats.reduce(
          (total, seat) => total + seat.seat_sal * this.totalTime,
          0
        );
      }
    },
    selectSeat(item) {
      this.selectedSeats.push(item);
    },

    deselectSeat(array, item) {
      //原本選到的座位刪除
      const index = array.findIndex(seat => seat.seat_id === item.seat_id);
      if (index !== -1) {
        array.splice(index, 1);
      }
    },
    confirmReserve() {
      // const now = new Date();
      // this.currentTime = now.toLocaleString();
      // this.currentTime=this.currentTime.substring(10);


      // this.formattedDate = `${dateObject.getFullYear()}-${(dateObject.getMonth() + 1).toString().padStart(2, '0')}-${dateObject.getDate().toString().padStart(2, '0')}`;
      // console.log(this.formattedDate);
      const startDateTime = `${this.formattedDate} ${this.reservation.startTime}:00`;
      const endDateTime = `${this.formattedDate} ${this.reservation.endTime}:00`;


      const reserveData = {
        mem_id: this.member.mem_id,
        seat_order_date: this.formattedCurrentDateTime,
        seat_order_sum: this.totalSal,
        seat_order_startdate: startDateTime,
        seat_order_enddate: endDateTime,
        seat_order_time: this.totalTime,
        seat_order_state: 0,
      };

      axios
        .post(`${this.$URL}/seatReserve.php`, JSON.stringify(reserveData), {
          headers: {
            'Content-Type': 'application/json'
          }
        })
        .then(response => {
          const responseData = response.data;
          console.log(responseData);
          if (responseData.message === '預約成功') { // Check the response message
            this.modalSwitch = true;
            setTimeout(() => {
              this.modalSwitch = false;
            }, 3000);
          } else {
            alert('預約失敗');
          }
        })
        .catch(error => {
          console.log(error);
          alert('預約失敗');
        });




      // const remain=this.member.remain-this.totalSal;
      this.axios.post(`${this.$URL}/updateMemberRemain.php`, JSON.stringify({
          mem_id: this.$store.state.member.mem_id,
          remain: (this.member.remain-this.totalSal).toString()
        }))
          .then(res => {
            console.log(res);
            this.$store.commit('setMemberRemain', (this.member.remain-this.totalSal).toString());
          })
          .catch(err => {
            console.log(err);
          })
    },

    fetchSeatData() {

      axios.get(`${this.$URL}/getSeat.php`)
        .then((res) => {
          // this.seatData = res.data;
          this.selectedData = res.data;
          console.log(res);
        })
        .catch((err) => {
          console.log(err);
        })

      axios.get(`${this.$URL}/getAllSeat.php`)
        .then((res) => {
          this.seatData = res.data;
          this.seats_a = this.seatData.filter(item => item.seat_id <= 30);
          this.seats_b = this.seatData.filter(item => 31 <= item.seat_id && item.seat_id <= 55);
          this.seats_c = this.seatData.filter(item => 56 <= item.seat_id && item.seat_id <= 65);
          this.seats_d = this.seatData.filter(item => 66 <= item.seat_id && item.seat_id <= 71);
        })
        .catch((err) => {
          console.log(err);
        })

      // axios
      //   .get("data/seat.json")
      //   .then((res) => {
      //     this.seatData = res.data;
      //     this.seats_a = this.seatData.filter(item => item.seat_id <= 30);
      //     this.seats_b = this.seatData.filter(item => 31 <= item.seat_id && item.seat_id <= 55);
      //     this.seats_c = this.seatData.filter(item => 56 <= item.seat_id && item.seat_id <= 65);
      //     this.seats_d = this.seatData.filter(item => 66 <= item.seat_id && item.seat_id <= 71);
      //   })
      //   .catch((err) => {
      //     console.log(err);
      //   });

    },

    //檢查登入狀態，沒登入就跳登入彈窗
    checkLogin() {
      if (!this.login) {
        this.toggleLogin(true);
      } else {
        return;
      }
    },
    goReservation() {
      this.$router.push('/member_center/member_seat_reservation');
      this.modalSwitch = false;
    },
    updateFormattedCurrentDateTime() {
      const now = new Date();
      const year = now.getFullYear();
      const month = String(now.getMonth() + 1).padStart(2, '0');
      const day = String(now.getDate()).padStart(2, '0');
      const hours = String(now.getHours()).padStart(2, '0');
      const minutes = String(now.getMinutes()).padStart(2, '0');
      const seconds = String(now.getSeconds()).padStart(2, '0');

      this.formattedCurrentDateTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    },


  },
  computed: {
    ...mapState(["isLoginOpen", "forgotPsw", 'login', 'member', 'keepLoginStatus', 'userTokenKey']),


  },
  watch: {},
  created() {
    this.fetchSeatData();
    // this.fetchSeatStateData();
    this.formatDateString();

  },
  mounted() {
    this.updateFormattedCurrentDateTime(); // 在 mounted 階段更新一次格式化後的現在時間
    setInterval(this.updateFormattedCurrentDateTime, 1000); // 每秒更新一次格式化後的現在時間
  }
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