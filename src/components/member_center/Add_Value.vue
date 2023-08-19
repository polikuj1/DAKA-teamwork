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
            <option v-if="creditData.length === 0" disabled>尚未有綁定的信用卡</option>
            <option v-for="card in creditData" :key="card.card_number" :value="card.card_number">{{ card.card_number }}</option>
            <option value="其他">其他</option>
          </select>
          
          <div v-if="selectedCreditCard === '其他'">
            <label for="cardNumber" class="charge_cardnumber">輸入卡號</label>
            <input type="text" id="cardNumber" name="cardNumber" v-model="cardNumber" required maxlength="16" @input="checkCardNumberInput">
            <p v-if="showCardNumberWarning" style="color: #FF5E1E;">請輸入有效的卡號</p>
            <label for="expiryDate" class="charge_expirydate">輸入卡片有效期限</label>
            <div class="charge_goodthru">
              <input type="month" id="expiryDate" v-model="expiryDate">
              <!-- <select v-model="selectedYear" required>
                <option value="請選擇" disabled selected>請選擇年份</option>
                <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
              </select> -->
              <!-- <select v-model="selectedMonth" required>
                <option value="請選擇" disabled selected>請選擇月份</option>
                <option v-for="month in months" :key="month" :value="month">{{ month }}</option>
              </select> -->
            </div>
            <label for="verificationCode" class="charge_verification">輸入驗證碼</label>
            <input type="text" id="verificationCode" name="verificationCode" required maxlength="3" @input="checkVerificationCodeInput" v-model="verificationCode">
            <p v-if="showVerificationCodeWarning" style="color:#FF5E1E;">請輸入有效的驗證碼</p>
            <br>
            <br>
            <div class="charge_bind">
              <input type="checkbox" id="isBound" v-model="isBound">
              <label for="isBound">是否綁定此信用卡</label>
            </div>
            <div class="charge_default">
              <input type="checkbox" id="isDefault" v-model="isDefault">
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
      expiryDate: '',
    }
  },
  methods: {
    back() {
      this.modalSwitch = false;
      this.$router.push('/member_center/member_nav');
    },
    submit() {
      if (this.isFormValid()) {
        this.modalSwitch = true;
        let form;
        let memberRemain;
        let id;
        this.creditData.forEach(item => {
          if(item.card_number == this.selectedCreditCard) {
            id = item.credit_id;
          }
        })
        let time = new Date();
        let year = time.getFullYear();
        let month = (time.getMonth() + 1).toString().padStart(2, '0');
        let day = time.getDate().toString().padStart(2, '0');
        let hours = time.getHours().toString().padStart(2, '0');
        let minutes = time.getMinutes().toString().padStart(2, '0');
        let seconds = time.getSeconds().toString().padStart(2, '0');
        let formattedDateTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

        if(this.selectedCreditCard !== '其他') {
          // 會員已經綁定的信用卡儲值
          form = {
            mem_id: this.$store.state.member.mem_id,
            credit_id: id,
            sdate: formattedDateTime,
            sval: this.selectedAmount,
            add_method: '1'
          };

        } else {
          // 其他，直接填信用卡號儲值，且可以順便綁定
          if(this.isBound) {
            form = {
              mem_id: this.$store.state.member.mem_id,
              credit_id: id,
              sdate: formattedDateTime,
              sval: this.selectedAmount,
              add_method: '1'
            };
            const year = this.expiryDate.substring(2,4);
            const month = this.expiryDate.substring(5,this.expiryDate.length);
            const valid = year + month;
            this.expiryDate = valid;
            const credit_data = {
              mem_id: this.$store.state.member.mem_id,
              card_number: this.cardNumber,
              valid: this.expiryDate,
              preset: this.isDefault,
              card_cvv: this.verificationCode,
            };
            this.axios.post(`${this.$URL}/addCredit.php`, JSON.stringify(credit_data))
            .then(res => {
              console.log(res);
            })
            .catch(err => {
              console.log(err);
            })
          }
        }
        memberRemain = parseInt(this.selectedAmount) + parseInt(this.$store.state.member.remain);
        // 增加一筆儲值紀錄
        this.axios.post(`${this.$URL}/addValue.php`, JSON.stringify(form))
          .then(res => {
            console.log(res);
          })
          .catch(err => {
            console.log(err);
          })
        // 更新會員的餘額狀態
        this.axios.post(`${this.$URL}/updateMemberRemain.php`, JSON.stringify({
          mem_id: this.$store.state.member.mem_id,
          remain: memberRemain.toString()
        }))
          .then(res => {
            console.log(res);
            this.$store.commit('setMemberRemain', memberRemain);
          })
          .catch(err => {
            console.log(err);
          })
      } else {
        this.warnTxt = true;
      }
    },
    isFormValid() {
      if (this.selectedAmount === '請選擇' || this.selectedCreditCard === '請選擇') {
        return false;
      }
      if (this.selectedCreditCard === '其他') {
        if (this.cardNumber.length !== 16 || this.cardNumber === '' || this.expiryDate === '' || this.verificationCode === '') {
          return false;
        }
      }
      return true;
    },
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
          // console.log(res);
          this.creditData = res.data;
          this.creditData.forEach(item => {
            item.card_number = item.card_number.slice(-4);
          })
          this.creditData = this.creditData.filter(item => item.outofdate == '1');
          console.log(this.creditData);
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
