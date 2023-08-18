<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <div class="comiclist_cart">
    <div class="comiclist_content">
      <div class="cart_l_reserve_title">
        <p class="cart_l_text">目前的預約（{{ comics_quantity.length }} 件）</p>
      </div>
      <div class="cart_m_reserve_title">
        <p class="cart_m_text">書名</p>
        <p class="cart_m_text">數量</p>
        <p class="cart_m_text">小計</p>
      </div>

      <!-- 書本照片 -->
      <div class="cart_book_content">
        <div
          v-for="(item, index) in comics_quantity"
          :key="item.id"
          class="cart_book"
        >
          <div
            class="cart_book_pic"
            @click="this.$router.push(`/comic_detail/${item.comics_id}`)"
          >
            <!-- <img :src="item.img" :alt="item.name" /> -->
            <Images :imgURL="`back/comic/${item.img}`" :alt="`${item.title}`" />
          </div>

          <!-- 書本名稱 -->
          <div class="cart_book_name">
            <p class="cart_m_text">{{ item.title }} {{ item.comics_index }}</p>
            <p class="cart_s_text">作者 : {{ item.author }}</p>
          </div>

          <!-- 數量 -->
          <div class="cart_book_count">
            <div class="cart_m_text">1{{ item.quantity }}</div>
          </div>

          <!-- 錢 -->
          <div class="cart_book_cash">
            <div class="cart_m_text">${{ 10 }}</div>
            <div class="cart_book_delete" @click="deleteProduct(index)">
              <i class="fa-solid fa-trash" style="color: #263238"></i>
            </div>
          </div>
        </div>
        <div v-show="comics_quantity.length === 0">
          您還沒有預約任何一本書，請開始
          <a @click="this.$router.push('/comic_search')">預約</a>
          你喜歡的漫畫吧！
        </div>
      </div>
    </div>

    <div class="comiclist_content">
      <div class="cart_l_count_title">
        <p class="cart_m_text">取書日期</p>
        <p class="cart_m_text">數量</p>
        <p class="cart_m_text">總計</p>
      </div>
      <div class="cart_m_count_title">
        <p class="cart_m_text">{{ comics_borrow_duedate }} 前</p>
        <p class="cart_m_text">{{ comics_quantity.length }}</p>
        <p class="cart_m_text">${{ comics_order_sum }}</p>
      </div>
    </div>

    <div class="comiclist_content">
      <div class="cart_l_rule_title">
        <p class="cart_l_text">{{ borrowingrulesarea.rulesTitle }}</p>
      </div>
      <div
        class="cart_m_rule_title"
        v-for="item in borrowingrulesarea.rulesDetails"
        :key="item.text"
      >
        <div class="cart_s_text">
          {{ item.text }}
        </div>
      </div>
    </div>
    <div class="btn_content">
      <a @click="submit"
        ><button class="comiclist_cartbtn">
          送出預約<i class="fa-solid fa-book-open-reader bookgap"></i></button
      ></a>
    </div>
  </div>
  <!-- 預約彈窗 -->
  <div class="comic_modal" v-show="modalSwitch">
    <div class="modal">
      <div class="pic">
        <img src="@/assets/images/member/modal.svg" alt="" />
      </div>
      <div class="reservation_fail" v-show="!remainingEnough">
        <span>預約失敗</span>
        <p>
          親愛的
          {{
            member.mname
          }}
          會員，您好！<br />您的儲值金已經不足，請盡快至會員中心儲值 。
        </p>
        <button @click="this.$router.push('/member_center/member_add_value')">
          前往儲值
        </button>
      </div>
      <div class="reservation_success" v-show="remainingEnough">
        <span>預約成功</span>
        <p>
          親愛的
          {{ member.mname }} 會員，您好！<br />請於以下日期前完成取書，謝謝您！
        </p>
        <span class="get_book">{{ comics_borrow_duedate }}</span>
        <button
          @click="this.$router.push('/member_center/member_book_reservation')"
        >
          查閱紀錄
        </button>
        <button @click="modalSwitch = false">確定</button>
      </div>
      <button @click="modalSwitch = false">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>
  </div>
</template>
<script>
// import {GET} from '@/plugin/axios';
import PageTitle from "@/components/PageTitle.vue";
export default {
  components: {
    PageTitle,
  },
  data() {
    return {
      title: "我的預約清單",
      comics_borrow_date: "",
      comics_borrow_duedate: "",
      modalSwitch: false,
      borrowingrulesarea: {
        rulesTitle: "預約須知",
        rulesDetails: [
          {
            text: "(1) 一本書籍借期三日，每多借一本則借期延後一日。",
          },
          {
            text: "(2) 書籍借期皆無法續借，到期時需重新預約租借。",
          },
          {
            text: "(3) 預約書籍其保留時間為三日。",
          },
          {
            text: "(4) 超過三日還未到店取書者，系統會自動扣除該預約金。",
          },
          {
            text: "(5) 逾期歸還者：每冊逾期 1 日罰款 1 元，依此類推。",
          },
          {
            text: "(6) 每個會員帳號最多只能借五本書。",
          },
        ],
      },
    };
  },

  computed: {
    remainingEnough() {
      return this.member.remain < this.comics_order_sum ? false : true;
    },
    /*書籍數量*/
    shoppingCartProducts() {
      return [...this.comics_quantity];
    },
    /*總計*/
    comics_order_sum() {
      return this.comics_quantity.length * 10;
    },
    member() {return this.$store.state.member},
    comics_quantity() {return this.$store.state.cart},
  },
  methods: {
    updateQuantityOfProduct(item, feature) {
      // const item = this.comics_quantity.find((item) => item.id === id);

      if (item.quantity === 1 && feature === "decrease") return;
      feature === "increase" ? item.quantity++ : item.quantity--;
    },

    // 刪除
    deleteProduct(id) {
      // const itemIndex = this.comics_quantity.findIndex(
      //   (item) => item.id === id
      // );
      this.$store.commit("deleteBook", id);
      // this.comics_quantity.splice(id, 1);
    },
    // 取書的所有相關日期
    getBookDate() {
      // 預約日期
      let time = new Date();
      let year = time.getFullYear();
      let month = (time.getMonth() + 1).toString().padStart(2, '0');
      let day = time.getDate().toString().padStart(2, '0');
      let formattedDateTime = `${year}-${month}-${day}`;
      this.comics_borrow_date = formattedDateTime;
      // 取書到期日
      let comics_borrow_duedate = `${year}-${month}-${parseInt(day)+3}`;
      this.comics_borrow_duedate = comics_borrow_duedate;
    },
    submit() {
      if(this.member.remain < this.comics_order_sum) {
        this.modalSwitch = true;
        return;
      }
      const form = {
        mem_id: this.member.mem_id,
        comics_order_status: 1,
        comics_order_date: this.comics_borrow_date,
        comics_borrow_duedate: this.comics_borrow_duedate,
        comics_quantity: this.comics_quantity.length,
        comics_order_sum: this.comics_order_sum,
        comics_payment_method: '儲值金扣款',
      };
      console.log(form);
      // 新增一筆書籍訂單
      this.axios.post(`${this.$URL}/addBookReservation.php`, JSON.stringify(form))
        .then(res => {
          console.log(res);
          // 取得最新一筆書籍訂單的id
          this.axios.get(`${this.$URL}/getNewestBookId.php`)
            .then(res => {
                console.log(res);
                // 新增一筆書籍訂單詳細明細
                for (let i = 0; i < this.comics_quantity.length; i++) {
                  const detail = {
                    comics_order_id: res.data[0].comics_order_id,
                    comics_id: this.comics_quantity[i].comics_id,
                  };
                  this.axios.post(`${this.$URL}/addBookReservationDetail.php`, JSON.stringify(detail))
                    .then(res => {
                      console.log(res);
                    })
                    .catch(err => {
                      console.log(err);
                    })
                }
                this.modalSwitch = true;
              })
              .catch(err => {
                console.log(err);
              })
        })
        .catch(err => {
          console.log(err);
        })
      // 更新會員儲值餘額、累積消費
      const memberRemain = parseInt(this.member.remain) - parseInt(this.comics_order_sum); 
      const memberValue = parseInt(this.member.value) + parseInt(this.comics_order_sum);
      this.axios.post(`${this.$URL}/updateMemberRemain.php`, JSON.stringify({
        mem_id: this.member.mem_id,
        remain: memberRemain.toString(),
        value: memberValue.toString(),
      }))
        .then(res => {
          console.log(res);
          this.$store.commit('setMemberRemain', memberRemain);
          this.$store.commit('setMemberValue', memberValue);
        })
        .catch(err => {
          console.log(err);
        })
      
      
    }
  },
  mounted() {
    // this.member = this.$store.state.member;
    // this.comics_quantity = this.$store.state.cart;
    this.getBookDate();
  },
};
</script>
