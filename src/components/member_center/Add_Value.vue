<template>
  <MbForm @emit-back="triggerParent">
    <template v-slot:mb_form_title>
      <h3>{{ title }}</h3>
    </template>
    <template v-slot:mb_content>
      <div id="member_charge">
        <form action="" class="charge_content">
          <label for="amount" class="charge_amount">選擇金額</label>
          <select id="amount" class="amount_option" v-model="selectedAmount" required>
            <option value="請選擇" disabled selected>請選擇</option>
            <option v-for="amount in amounts" :key="amount" :value="amount">{{ amount }}</option>
          </select>
          
          <label for="creditCard" class="charge_card">選擇扣款信用卡</label>
          <select id="creditCard" class="card_option" v-model="selectedCreditCard" required>
            <option value="請選擇" disabled selected>請選擇</option>
            <!-- <option v-for="card in boundCreditCards" :key="card" :value="card">{{ card }}</option> -->
            <option v-for="card in creditData" :key="card.card_number" :value="card.card_number">{{ card.card_number }}</option>
            <option value="其他">其他</option>
          </select>
          
          <div v-if="selectedCreditCard === '其他'">
            <label for="cardNumber" class="charge_cardnumber">輸入卡號</label>
            <input type="text" id="cardNumber" name="cardNumber" v-model="cardNumber" required maxlength="16" @input="checkCardNumberInput">
            <p v-if="showCardNumberWarning" style="color: #FF5E1E;">請輸入有效的卡號</p>
            <label for="expiryDate" class="charge_expirydate">輸入卡片有效期限</label>
            <div class="charge_goodthru">
              <select v-model="selectedYear" required>
                <option value="請選擇" disabled selected>請選擇年份</option>
                <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
              </select>
              <select v-model="selectedMonth" required>
                <option value="請選擇" disabled selected>請選擇月份</option>
                <option v-for="month in months" :key="month" :value="month">{{ month }}</option>
              </select>
            </div>
            <label for="verificationCode" class="charge_verification">輸入驗證碼</label>
            <input type="text" id="verificationCode" name="verificationCode" required maxlength="3" @input="checkVerificationCodeInput" v-model="verificationCode">
            <p v-if="showVerificationCodeWarning" style="color:#FF5E1E;">請輸入有效的驗證碼</p>
            <br>
            <br>
            <div class="charge_bind">
              <input type="checkbox" id="isBound" value="true" v-model="isBound">
              <label for="isBound">是否綁定此信用卡</label>
            </div>
            <div class="charge_default">
              <input type="checkbox" id="isDefault" value="true" v-model="isDefault">
              <label for="isDefault">是否將此信用卡設為預設卡片</label>
            </div>
          </div>
          <br>
          <p class="check_alert" v-show="warnTxt">需填寫所有欄位，請確認</p>
          <button type="button" @click="submit" class="submit_btn">確認送出</button>
        </form>
      </div>
    </template>
    <template v-slot:mb_modal>
      <MbModal v-show="modalSwitch">
        <template v-slot:modal_txt>
          <div class="bind_success">
            <span>儲值成功！</span>
            <button @click="back">返回</button>
          </div>
        </template>
      </MbModal>
    </template>
  </MbForm>
</template>

<script>
import MbModal from '@/components/member_center/MemberModal.vue'
import MbForm from '@/components/member_center/form_style.vue';
export default {
  components: {
    MbForm, MbModal,
  },
  data() {
    return {
      title: '線上儲值',
      selectedAmount: '請選擇',
      amounts: ['100', '500', '1000', '5000'], 
      selectedCreditCard: '請選擇', 
      boundCreditCards: ['中國信託LINE聯名卡', '富邦J卡', 'Richart'],
      cardNumber: '', 
      selectedYear: '請選擇',
      years: ['2030','2029','2028','2027','2026','2025','2024','2023'],
      selectedMonth: '請選擇',
      months: ['01','02','03','04','05','06','07','08','09','10','11','12'],
      verificationCode: '', 
      isBound: false, 
      isDefault: false,
      showCardNumberWarning: false,
      showVerificationCodeWarning: false,
      modalSwitch: false,
      warnTxt: false,
      creditData:[],
    }
  },
  methods: {
    back() {
      this.modalSwitch = false;
      this.$router.push('/member_center/member_nav');
    },
    submit() {
      if (this.isFormValid()) {
        // 會員已經綁定的信用卡儲值
        this.modalSwitch = true;
        const time = new Date();
        const form = {
          mem_id: this.$store.state.member.mem_id,
          credit_id: this.creditData.credit_id,
          sdate: time,
          sval: this.selectedAmount,
          add_method: 1
        };
        this.axios.post(`${this.$URL}/addValue.php`,)
      } else {
        this.warnTxt = true;
      }
    },
    isFormValid() {
      if (this.selectedAmount === '請選擇' || this.selectedCreditCard === '請選擇') {
        return false;
      }
      if (this.selectedCreditCard === '其他') {
        if (this.cardNumber === '' || this.selectedYear === '請選擇' || this.selectedMonth === '請選擇' || this.verificationCode === '') {
          return false;
        }
      }

      return true;
    },
    // submit() {
    //   /*獲取填寫的假資料和選擇的信用卡資訊*/
    //   const amount = this.selectedAmount;
    //   const selectedCreditCard = this.selectedCreditCard;
    //   const cardNumber = this.cardNumber;
    //   const expiryDate = this.selectedYear + this.selectedMonth;
    //   const verificationCode = this.verificationCode;
    //   const isBound = this.isBound;
    //   const isDefault = this.isDefault;

    //   this.modalSwitch = true;
    // },
    checkCardNumberInput() {
      const regex = /^[0-9]*$/; 
      this.showCardNumberWarning = !regex.test(this.cardNumber);
    },
    checkVerificationCodeInput() {
      const regex = /^[0-9]*$/; 
      this.showVerificationCodeWarning = !regex.test(this.verificationCode);
    },
    triggerParent() {
      this.$emit('emit-title','');
    },
    getData() {
      const params = {
        id: this.$store.state.member.mem_id
      }
      this.axios.get(`${this.$URL}/getCredit.php`, { params: params})
        .then(res => {
          console.log(res);
          this.creditData = res.data;
          this.creditData.forEach(item => {
            item.card_number = item.card_number.slice(-4);
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
