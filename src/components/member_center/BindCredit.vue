<template>
  <MbForm @emit-back="triggerParent">
    <template v-slot:mb_form_title>
      <h3>{{ title }}</h3>
    </template>
    <template v-slot:mb_content>
      <div class="no_credit" v-if="!credit_card[0]">
        <span>無可用信用卡</span>
        <a @click="this.$router.push('/member_center/member_add_credit')">新增信用卡</a>
      </div>
      <div class="have_credit" v-else>
        <div class="credit_wrap" v-for="card in credit_card" :key="card.number">
          <!-- <div class="credit_card" :class="card.publish_copy === 'VISA'? 'blue': 'red'"> -->
          <div class="credit_card blue">
            <button @click="deleteCard(card.credit_id)"><i class="fa-solid fa-x"></i></button>
            <span>VISA</span>
            <span><img src="@/assets/images/member/creditcard.svg" alt=""></span>
            <span class="credit_number">{{ card.card_number }}</span>
            <div class="credit_info">
              <span>{{ card.vaild }}</span>
              <span>cvv {{ card.card_cvv }}</span>
            </div>
          </div>
          <label>
            <input type="radio" name="default_card" :checked="card.preset === 1">
            <span v-if="card.preset === 1">預設卡片</span>
            <span v-else>選擇此卡為預設卡片</span>
          </label>
        </div>
      </div>
    </template>
  </MbForm>
</template>

<script>
import MbForm from '@/components/member_center/form_style.vue';
export default {
  components: {
    MbForm
  },
  data() {
    return {
      title: '付款方式',
      credit_card: [],
    }
  },
  methods: {
    triggerParent() {
      this.$emit('emit-title','');
    },
    deleteCard(credit_id) {
      const id = credit_id;
      this.axios.post(`${this.$URL}/deleteCredit.php`, JSON.stringify({ credit_id: id }),{
          headers: {
              'Content-Type': 'text/plain'
          },
      })
        .then(res => {
          console.log(res);
          this.getData();
        })
        .catch(err =>{
          console.log(err);
        })
    },
    getData() {
      const params = {
        id: this.$store.state.member.mem_id
      }
      this.axios.get(`${this.$URL}/getCredit.php`, { params: params} )
        .then(res => {
          console.log(res);
          this.credit_card = res.data.filter(item => item.outofdate ==='1');
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