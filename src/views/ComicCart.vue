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
            @click="this.$router.push(`/comic_detail/${item.id}`)"
          >
            <!-- <img :src="item.img" :alt="item.name" /> -->
            <Images :imgURL="`comic/${item.img}`" :alt="`${item.title}`" />
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
        <!-- <p class="cart_m_text">歸還日期</p> -->
        <p class="cart_m_text">數量</p>
        <p class="cart_m_text">總計</p>
      </div>
      <div class="cart_m_count_title">
        <p class="cart_m_text">{{ comics_borrow_duedate }} 前</p>
        <!-- <p class="cart_m_text">{{ returnDate }}</p> -->
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
      <a @click="modalSwitch = true"
        ><button class="comiclist_cartbtn">
          送出預約<i class="fa-solid fa-book-open-reader bookgap"></i></button
      ></a>
    </div>
  </div>
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
        <span class="get_book">2023 - 07 - 16 </span>
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
      comics_quantity: [],
      comics_borrow_duedate: "",
      modalSwitch: false,
      member: {},
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
    /*書籍數量*/
    shoppingCartProducts() {
      return [...this.comics_quantity];
    },

    shoppingCartItemsCount() {
      return this.shoppingCartProducts.length;
    },

    /*總計*/
    comics_order_sum() {
      return this.shoppingCartProducts.length * 10;
      // return (
      //   Math.floor(
      //     this.shoppingCartProducts.reduce(
      //       (acc, product) => acc + product.price * 1,
      //       0
      //     ) * 10
      //   ) / 10
      // );
    },

    // 借閱日期
    getBorrowDays() {
      return 3 + Math.max(this.shoppingCartItemsCount - 1, 0); // 借書天数規則：3天 + (購物車中書本 - 1)
    },
    // 歸還日期
    returnDate() {
      // 計算歸還日期
      // if (!this.comics_borrow_duedate) return ""; // 如果没有借書日期，則歸還日期為空
      // console.log(this.comics_borrow_duedate);

      // 將借書日期轉成日期對象
      const comics_borrow_duedateObj = new Date(this.comics_borrow_duedate);
      console.log(comics_borrow_duedateObj);

      // 獲取借書日期
      const borrowDays = this.getBorrowDays;
      console.log(borrowDays);
      // 計算歸還日期
      const returnDateObj = new Date(
        comics_borrow_duedateObj.getTime() + borrowDays * 24 * 60 * 60 * 1000
      );

      // 格式化歸還日期字串
      const returnYear = returnDateObj.getFullYear();
      const returnMonth =
        returnDateObj.getMonth() + 1 < 10
          ? "0" + (returnDateObj.getMonth() + 1)
          : returnDateObj.getMonth() + 1;
      const returnDate =
        returnDateObj.getDate() < 10
          ? "0" + returnDateObj.getDate()
          : returnDateObj.getDate();

      return returnYear + "/" + returnMonth + "/" + returnDate;
    },

    // 判斷儲值金是否足夠
    remainingEnough() {
      if (this.member.remain > this.comics_order_sum) {
        return true;
      } else {
        return false;
      }
    },
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

    // 總計
    // calculatePrice(price, quantity) {
    //   return Math.floor(price * quantity * 10) / 10;
    // },

    // 取書日期
    timeFormate(timeStamp) {
      let newdate = new Date(timeStamp);
      let year = newdate.getFullYear();
      let month =
        newdate.getMonth() + 1 < 10
          ? "0" + (newdate.getMonth() + 1)
          : newdate.getMonth() + 1;
      let date =
        newdate.getDate() < 10 ? "0" + newdate.getDate() : newdate.getDate();
      this.comics_borrow_duedate = year + "/" + month + "/" + date;
      console.log(this.comics_borrow_duedate);
    },
    // 定時器函數
    nowTimes() {
      let self = this;
      self.timeFormate(new Date());
    },
  },
  // 掛載完成時
  mounted() {
    this.member = this.$store.state.member;
    this.comics_quantity = this.$store.state.cart;
    this.nowTimes();
  },
};
</script>
