<template>
  <MbForm @emit-back="triggerParent">
    <template v-slot:mb_form_title>
      <h3>{{ title }}</h3>
    </template>
    <template v-slot:mb_content>
      <div class="no_credit">
        <span>無可用信用卡</span>
        <a @click="this.$router.push('/member_center/member_add_credit')">新增信用卡</a>
      </div>
      <div class="have_credit">
        <div class="credit_wrap" v-for="card in credit_card" :key="card.number">
          <div class="credit_card" :class="card.publish_copy === 'VISA'? 'blue': 'red'">
            <button @click="deleteCard(card.number)"><i class="fa-solid fa-x"></i></button>
            <span>{{ card.publish_copy }}</span>
            <span><img src="@/assets/images/member/creditcard.svg" alt=""></span>
            <span class="credit_number">{{ card.number }}</span>
            <div class="credit_info">
              <span>{{ card.date }}</span>
              <span>cvv {{ card.cvv }}</span>
            </div>
          </div>
          <label>
            <input type="radio" name="default_card">
            選擇此卡為預設卡片
          </label>
        </div>
      </div>
    </template>
    <template v-slot:mb_modal>
      <MbModal>
        <template v-slot:modal_txt>
          <div>
            1233
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
    MbForm, MbModal
  },
  data() {
    return {
      title: '付款方式',
      credit_card: [
        {
          publish_copy: 'VISA',
          number: 1234567812345678,
          date: '06 / 27',
          cvv: 124,
        },
        {
          publish_copy: 'MasterCard',
          number: 1234567812345679,
          date: '06 / 27',
          cvv: 124,
        },
      ],
    }
  },
  methods: {
    triggerParent() {
      this.$emit('emit-title','');
    },
    deleteCard(num) {
      if(this.credit_card.length === 1 ) {
        this.credit_card = [];
      }
      this.credit_card = this.credit_card.filter(item => item.number === num);
    }
  },
  created() {
    this.$emit('emit-title',this.title);
  },
}
</script>