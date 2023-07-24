
<template>
  <PageTitle>
    {{ title }}
  </PageTitle>

  <div class="comiclist_cart">
    <div class="comiclist_content">
      <div class="cart_l_reserve_title">
        <p class="cart_l_text">目前的預約（{{ shoppingCartItemsCount }} 件）</p>
      </div>
      <div class="cart_m_reserve_title">
        <p class="cart_m_text">書名</p>
        <p class="cart_m_text">數量</p>
        <p class="cart_m_text">小計</p>
      </div>

      <!-- 書本照片 -->
      <div class="cart_book_content">
        <div v-for="item in shoppingCartData" :key="item.id" class="cart_book">
          <div class="cart_book_pic">
            <img :src="item.imgSrc" :alt="item.name" />
          </div>

          <!-- 書本名稱 -->
          <div class="cart_book_name">
            <p class="cart_m_text">{{ item.category }}</p>
            <p class="cart_s_text">{{ item.name }}</p>
          </div>

          <!-- 數量 -->
          <div class="cart_book_count">
            <div class="cart_m_text">{{ item.quantity }}</div>
          </div>

          <!-- 錢 -->
          <div class="cart_book_cash">
            <div class="cart_m_text">$ {{ item.price }}</div>
            <div class="cart_book_delete" @click="deleteProduct(item.id)"><i class="fa-solid fa-trash"
                style="color: #263238;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="comiclist_content">
      <div class="cart_l_count_title">
        <p class="cart_m_text">取書日期</p>
        <p class="cart_m_text">歸還日期</p>
        <p class="cart_m_text">數量</p>
        <p class="cart_m_text">總計</p>
      </div>
      <div class="cart_m_count_title">
        <p class="cart_m_text">{{ borrowDate }}</p>
        <p class="cart_m_text">{{ returnDate }}</p>
        <p class="cart_m_text">{{ shoppingCartItemsCount }}</p>
        <p class="cart_m_text">${{ shoppingCartProductsSum }}</p>
      </div>
    </div>

    <div class="comiclist_content">
      <div class="cart_l_rule_title">
        <p class="cart_l_text">預約須知</p>
      </div>
      <div class="cart_m_rule_title">
        <div class="cart_s_text">
          <p>（一）一本書籍借期三日，每多借一本則借期延後一日。</p>
          <p>（二）書籍借期皆無法續借，到期時需重新預約租借。</p>
          <p>（三）預約書籍其保留時間為三日，超過三日還未到店取書時，系統會自動扣除該筆預約金額。</p>
          <p>（四）書籍借閱未於期限內歸還者：每冊逾期 1 日罰款 1 元，依此類推。</p>
          <p>（五）每個會員帳號最多只能借五本書</p>
        </div>
      </div>
    </div>

    <button class="comiclist_cartbtn">送出預約<i class="fa-sharp fa-solid fa-book-open-reader" style="color: #ffffff;"></i>
    </button>
  </div>
</template>
<style>
@import '@/assets/scss/page/comiccart.scss';
</style>
<script>
import PageTitle from '@/components/PageTitle.vue';
export default {
  components: {
    PageTitle,
  },
  data() {
    return {
      title: "我的預約清單",
      shoppingCartData: [
        {
          id: "first",
          imgSrc: "../assets/images/comic/jyujyutsu02.png",
          category: "咒術迴戰 01",
          name: "作者：芥見下々",
          price: 10,
          quantity: 1,
        },
        {
          id: "second",
          imgSrc: "../assets/images/comic/jyujyutsu02.png",
          category: "咒術迴戰 02",
          name: "作者：芥見下々",
          price: 10,
          quantity: 1,
        },
        {
          id: "third",
          imgSrc: "../assets/images/comic/jyujyutsu03.png",
          category: "咒術迴戰 03",
          name: "作者：芥見下々",
          price: 10,
          quantity: 1,
        },
        {
          id: "fourth",
          imgSrc: "../assets/images/comic/jyujyutsu02.png",
          category: "咒術迴戰 04",
          name: "作者：芥見下々",
          price: 10,
          quantity: 1,
        },
        {
          id: "fifth",
          imgSrc: "../assets/images/comic/jyujyutsu03.png",
          category: "咒術迴戰 05",
          name: "作者：芥見下々",
          price: 10,
          quantity: 1,
        },
      ],
      borrowDate: "",

    };
  },

  computed: {
    // 書籍數量
    shoppingCartProducts() {
      return [...this.shoppingCartData];
    },

    shoppingCartItemsCount() {
      return this.shoppingCartProducts.length;
    },

    // 總計
    shoppingCartProductsSum() {
      return (
        Math.floor(
          this.shoppingCartProducts.reduce(
            (acc, product) => acc + product.price * product.quantity,
            0
          ) * 10
        ) / 10
      );
    },

    // 借閱日期
    getBorrowDays() {
      return 3 + Math.max(this.shoppingCartItemsCount - 1, 0); // 借書天数規則：3天 + (購物車中書本 - 1)
    },
    // 歸還日期
    returnDate() {
      // 計算歸還日期
      // if (!this.borrowDate) return ""; // 如果没有借書日期，則歸還日期為空
      // console.log(this.borrowDate);

      // 將借書日期轉成日期對象
      const borrowDateObj = new Date(this.borrowDate);
      console.log(borrowDateObj);

      // 獲取借書日期
      const borrowDays = this.getBorrowDays;
      console.log(borrowDays);
      // 計算歸還日期
      const returnDateObj = new Date(borrowDateObj.getTime() + (borrowDays * 24 * 60 * 60 * 1000));

      // 格式化歸還日期字串
      const returnYear = returnDateObj.getFullYear();
      const returnMonth = returnDateObj.getMonth() + 1 < 10 ? "0" + (returnDateObj.getMonth() + 1) : returnDateObj.getMonth() + 1;
      const returnDate = returnDateObj.getDate() < 10 ? "0" + returnDateObj.getDate() : returnDateObj.getDate();

      return returnYear + "/" + returnMonth + "/" + returnDate;
    },
  },

  methods: {
    updateQuantityOfProduct(item, feature) {
      // const item = this.shoppingCartData.find((item) => item.id === id);

      if (item.quantity === 1 && feature === "decrease") return;
      feature === "increase" ? item.quantity++ : item.quantity--;
    },

    // 刪除
    deleteProduct(id) {
      const itemIndex = this.shoppingCartData.findIndex(
        (item) => item.id === id
      );
      this.shoppingCartData.splice(itemIndex, 1);
    },

    // 總計
    // calculatePrice(price, quantity) {
    //   return Math.floor(price * quantity * 10) / 10;
    // },

    // 取書日期
    timeFormate(timeStamp) {
      let newdate = new Date(timeStamp);
      let year = newdate.getFullYear();
      let month = newdate.getMonth() + 1 < 10 ? "0" + (newdate.getMonth() + 1) : newdate.getMonth() + 1;
      let date = newdate.getDate() < 10 ? "0" + newdate.getDate() : newdate.getDate() + 3;
      this.borrowDate = year + "/" + month + "/" + date;
    },
    // 定時器函數
    nowTimes() {
      let self = this;
      self.timeFormate(new Date());
    },
  },
  // 掛載完成時
  mounted() {
    this.nowTimes();
  },

}

</script>