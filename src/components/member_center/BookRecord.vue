<template>
  <MbForm @emit-back="triggerParent">
    <template v-slot:mb_form_title>
      <h3>{{ title }}</h3>
    </template>
    <template v-slot:mb_content>
      <div class="order_wrap" v-for="record in reservation" :key="record.reservation_no">
        <span>訂單編號 {{ record.comics_order_no }}</span>
        <div class="order_detail">
          <ul class="box">
            <li>
              <span>訂單狀態</span>
              <span>{{ record.comics_order_status }}</span>
            </li>
            <li>
              <span>預約日期</span>
              <span>{{ record.comics_order_date }}</span>
            </li>
            <li>
              <span>取書日期</span>
              <span>{{ record.comics_borrow_duedate }}</span>
            </li>
          </ul>
          <ul class="box">
            <li>
              <span>應還日期</span>
              <span>{{ record.comics_return_date }}</span>
            </li>
            <li>
              <span>歸還日期</span>
              <span>{{ record.comics_return_duedate }}</span>
            </li>
            <li>
              <span>罰金</span>
              <span>NTD$ {{ record.comic_delay_penalty }}</span>
            </li>
          </ul>
          <ul class="box">
            <li>
              <span>書籍數量</span>
              <span>{{ record.comics_quantity }}</span>
            </li>
            <li>
              <span>消費金額</span>
              <span>NTD$ {{ record.comics_order_sum }}</span>
            </li>
            <li>
              <span>付款方式</span>
              <span>{{ record.comics_payment_method }}</span>
            </li>
          </ul>
        </div>
        <div class="book_detail">
          <nav>
            <input type="checkbox" name="" :id="record.comics_ids">
            <div class="top_nav">
              <label :for="record.comics_ids">書籍明細</label>
              <span @click="openModal(record.comics_order_id)" v-if="record.comics_order_status === '未取書'">取消預約</span>
            </div>
            <table>
              <thead>
                <tr>
                  <th>書籍編碼</th>
                  <th>漫畫名稱</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(isbn, index) in record.isbns" :key="isbn">
                  <td>{{ isbn }}</td>
                  <td>{{ record.titles[index] }}</td>
                </tr>
              </tbody>
            </table>
          </nav>
        </div>
      </div>
    </template>
    <template v-slot:mb_modal>
      <MbModal v-show="modalSwitch">
        <template v-slot:modal_txt>
          <div class="seat_modal">
            <span>確定取消嗎?</span>
            <button @click="confirmCancel">取消預約</button>
            <button @click="modalSwitch = false">保留預約</button>
          </div>
        </template>
      </MbModal>
      </template>
  </MbForm>
</template>
<script>
import {GET} from '@/plugin/axios';
import MbModal from '@/components/member_center/MemberModal.vue';
import MbForm from '@/components/member_center/form_style.vue';
export default {
  components: {
    MbForm, MbModal,
  },
  data() {
    return {
      title: '書籍租借紀錄',
      reservation: [],
      modalSwitch: false,
      dataCancel: null,
      comicDetail: [],
    }
  },
  methods: {
    triggerParent() {
      this.$emit('emit-title','');
    },
    openModal(id) {
      this.dataCancel = id;
      this.modalSwitch = true;
    },
    confirmCancel() {
      this.modalSwitch = false;
      // dataCancel預約的那筆資料打過去資料庫處理

      this.axios.post(`${this.$URL}/cancelBookReservation.php`,JSON.stringify({ comics_order_id: this.dataCancel }) ,{
          headers: {
              'Content-Type': 'text/plain'
          },
      })
        .then(res => {
          console.log(res);
          this.getData();
        })
        .catch(err => {
          console.log(err);
        })
    },
    getData() {
      const params = {
        id: this.$store.state.member.mem_id
      }
      this.axios.get(`${this.$URL}/getBookRecord.php`,{ params: params} )
        .then(res => {
          console.log(res);
          this.reservation = res.data;
          this.reservation.forEach(item => {
            switch (item.comics_order_status) {
              case '0':
                item.comics_order_status = '預約過期';
                break;
              case '1':
                item.comics_order_status = '未取書';
                break;
              case '2':
                item.comics_order_status = '已取消';
                break;
              case '3':
                item.comics_order_status = '已取書';
                break;
              case '4':
                item.comics_order_status = '有罰金';
                break;
              case '5':
                item.comics_order_status = '預約過期';
                break;
            }
          })
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