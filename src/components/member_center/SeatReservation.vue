<template>
    <MbForm @emit-back="triggerParent">
      <template v-slot:mb_form_title>
        <h3>{{ title }}</h3>
      </template>
      <template v-slot:mb_content>
        <div class="member_center_res">
            <div class="reservation_container" v-for="reservation in reservations" :key="reservation.id">
                <div class="reservation_card">
                    <div class="reservation_number">
                        <p>訂位序號</p>
                        <p>{{ reservation.seat_order_no }}</p>
                    </div>
                    <div class="reservation_list">
                        <div class="reservation_usetime">
                            <p class="seat_usetime">開台時間</p> 
                            <p>{{ reservation.seat_order_dates }}<br>{{ reservation.time }}</p>
                        </div>
                        <div class="member_reservation_seat">
                            <p class="seat_number">座位編號</p> 
                            <p>{{ reservation.seat_areas }}<br>{{ reservation.seat_numbers }}</p>
                        </div>
                        <div class="reservation_amount">
                            <p class="seat_cost">金額</p> 
                            <p>{{ reservation.seat_order_sums }}</p>
                        </div>
                        <div class="reservation_payment">
                            <p class="seat_pay">付款方式</p> 
                            <p>儲值金</p>
                        </div>
                    </div>
                </div>
                <div class="seat_reservation_status">
                    <div class="reservation_status" :style="statusStyle(reservation.status)">
                        <p>{{ reservation.status }}</p>
                    </div>
                    <div v-if="reservation.status === '預約中'">
                        <button @click="cancelReservation(reservation.id)">取消預約</button>
                    </div>
                </div>
            </div>
        </div>
      </template>
      <template v-slot:mb_modal>
      <MbModal v-show="modalSwitch">
        <template v-slot:modal_txt>
          <div class="seat_modal">
            <span>確定取消嗎?</span>
            <button @click="confirmCancel">取消預約</button>
            <button @click="preserve">保留預約</button>
          </div>
        </template>
      </MbModal>
      </template>
    </MbForm>
  </template>
  
  <script>
//   import {GET} from '@/plugin/axios';
  import MbModal from '@/components/member_center/MemberModal.vue';
  import MbForm from '@/components/member_center/form_style.vue';
  export default {
    components: {
      MbForm, MbModal
    },
    data() {
        return {
            title: '座位預約紀錄',
            reservations: [],
            modalSwitch: false,
            reservationId: null,
        };
      
    },
    methods: {
        cancelReservation(reservationId) {
            this.modalSwitch = true;
            this.reservationId = reservationId;
        },
        confirmCancel() {
            this.reservations = this.reservations.map((reservation) => {
                if (reservation.id === this.reservationId) {
                reservation.status = '已取消';
                }
                return reservation;
            });
            this.modalSwitch = false;
        },
        preserve() {
           this.modalSwitch = false;
           this.$router.push('/member_center/member_seat_reservation');
        },
        /*狀態不同背景顏色不同*/
        statusStyle(status){
            if(status==='已完成'|| status === '已取消'){
                return{
                    backgroundColor:'#F6CE6E',
                    opacity: '0.5',
                };
            }else if(status==='預約中'){
                return {
                    backgroundColor: '#F6CE6E',
                    opacity: '1',
                };
            }
        },
        triggerParent() {
            this.$emit('emit-title','');
        },
  },
    computed: {
        
    },
    created() {
        this.$emit('emit-title',this.title);
        const params = {
            id: this.$store.state.member.mem_id
        }
        console.log(params);
        this.axios.get(`${this.$URL}/getSeatRecord.php`, {params: params})
                .then((res) => {
                    console.log(res);
                    this.reservations = res.data;
                    // 將座位的代碼轉換成對應的名稱
                    this.reservations.forEach(item => {
                        switch (item.seat_areas) {
                            case 'A':
                                item.seat_areas = '大廳一般區';
                                break;
                            case 'B':
                                item.seat_areas = '大廳電競區';
                                break;
                            case 'C':
                                item.seat_areas = '包廂單人房';
                                break;
                            case 'D':
                                item.seat_areas = '包廂雙人房';
                                break;
                        }

                    })
                })
                .catch((err) => {
                console.log(err);
                })
    }
  }
  </script>