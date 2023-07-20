<template>
  <PageTitle>
      {{ title }}
  </PageTitle>
  <div id="member_charge">
    <div class="online_charge">
      <span class="charge_icon"><i class="fa-solid fa-circle-chevron-left"></i></span>
      <p class="charge_title">線上儲值</p>
    </div>

    <form action="" class="charge_content">
      <label for="amount" class="charge_amount">選擇金額:</label>
      <select id="amount" class="amount_option" v-model="selectedAmount" required>
        <option v-for="amount in amounts" :value="amount">{{ amount }}</option>
      </select>
      <br>
      <label for="creditCard" class="charge_card">選擇扣款信用卡:</label>
      <select id="creditCard" class="card_option" v-model="selectedCreditCard" required>
        <option v-for="card in boundCreditCards" :value="card">{{ card }}</option>
      </select>
      <br>
      <label for="cardNumber" class="charge_cardnumber">輸入卡號:</label>
      <input type="number" id="cardNumber" name="cardNumber" required>
      <br>
      <label for="expiryDate">輸入卡片有效期限:</label>
        <div class="charge_goodthru">
          <select v-model="selectedYear" required>
            <option value="">選擇年份</option>
            <option v-for="year in years" :value="year">{{ year }}</option>
          </select>
          <select v-model="selectedMonth" required>
            <option value="">選擇月份</option>
            <option v-for="month in months" :value="month">{{ month }}</option>
          </select>
        </div>
      <br>  
      <label for="verificationCode">輸入驗證碼3碼:</label>
      <input type="number" id="verificationCode" name="verificationCode" required>
    </form>
    

    <div class="charge_bind">
      <input type="checkbox" id="isBound" value="true" v-model="isBound" required>
      <label for="bind">是否綁定此信用卡</label>
    </div>
    <div class="charge_default">
      <input type="checkbox" id="default" value="true" v-model="isDefault" required>
      <label for="default">是否將此信用卡設為預設卡片</label>
    </div>
      
    <button type="button" onclick="simulateSuccess()">送出</button>

  </div>

</template>

<script>
import PageTitle from '@/components/PageTitle.vue';
export default {
  components: {
    PageTitle
  },
  data() {
    return {
      title: '會員中心',
      selectedAmount: '',
      amounts: ['100', '500', '1000', '5000'], // 假資料 - 金額選項
      selectedCreditCard: '', // 初始化選擇的信用卡為空
      boundCreditCards: ['中國信託LINE聯名卡', '富邦J卡', 'Richart'], // 假資料 - 綁定信用卡列表
      cardNumber: '', // 輸入的卡號
      selectedYear: ['2026','2025','2024','2023','2022','2021','2020','2019'], // 初始化選擇的年份為空
      selectedMonth: ['1','2','3','4','5','6','7','8','9','10','11','12'], // 初始化選擇的月份為空
      verificationCode: '', // 輸入的驗證碼
      isBound: false, // 是否綁定此信用卡
      isDefault: false, // 是否將此信用卡設為預設卡片
    }
  },
  methods: {
    simulateSuccess() {
      // 獲取填寫的假資料和選擇的信用卡資訊
      const amount = this.selectedAmount;
      const selectedCreditCard = this.selectedCreditCard;
      const cardNumber = this.cardNumber;
      const expiryDate = this.selectedYear + this.selectedMonth;
      const verificationCode = this.verificationCode;
      const isBound = this.isBound;
      const isDefault = this.isDefault;

      // 將填寫的假資料和選擇的信用卡資訊一起處理
      // 可以透過 AJAX 或 Fetch 將資料傳送到後端 API 進行處理

      // 模擬儲值成功的彈窗
      alert('儲值成功！');
    }

  },
  computed: {

  },
}

</script>
