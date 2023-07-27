<template>
    <MbForm @emit-back="triggerParent">
      <template v-slot:mb_form_title>
        <h3>{{ title }}</h3>
      </template>
      <template v-slot:mb_content>
        <div class="reservation_container" v-for="reservation in reservations" :key="reservation.id">
            <div class="reservation_card">
                <div class="reservation_number">
                    <p>訂位序號</p>
                    <p>{{ reservation.bookingNumber }}</p>
                </div>
                <div class="reservation_list">
                    <div class="reservation_usetime">
                        <p class="seat_usetime">開台時間</p> 
                        <p>{{ reservation.date }}<br>{{ reservation.time }}</p>
                    </div>
                    <div class="reservation_seat">
                        <p class="seat_number">座位編號</p> 
                        <p>{{ reservation.seatArea }}<br>{{ reservation.seatNumber }}</p>
                    </div>
                    <div class="reservation_amount">
                        <p class="seat_cost">金額</p> 
                        <p>{{ reservation.amount }}</p>
                    </div>
                    <div class="reservation_payment">
                        <p class="seat_pay">付款方式</p> 
                        <p>{{ reservation.paymentMethod }}</p>
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
            title: '座位預約紀錄',
            reservations: [],
        };
      
    },
    methods: {
        cancelReservation(reservationId) {
            this.reservations = this.reservations.map((reservation) => {
                if (reservation.id === reservationId) {
                reservation.status = '已取消';
                }
                return reservation;
            });
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
        this.axios.get('/data/seat_reservation.json')
        .then((res) => {
        this.reservations = res.data;
        })
        .catch((err) => {
        console.log(err);
        })
    }
  }
  </script>