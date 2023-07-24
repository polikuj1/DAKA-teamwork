<template>
    <MbForm @emit-back="triggerParent">
      <template v-slot:mb_form_title>
        <h3>{{ title }}</h3>
      </template>
      <template v-slot:mb_content>
        <div class="value_record" v-for="record in transactionRecords" :key="record.transactionId">
            <div class="record_list">
                <div class="record_id">交易序號 {{ record.transactionId }}</div>
                <div class="record_date">{{ record.transactionDate }}</div>
            </div>
            <div class="record_content">
                <div class="record_method">儲值方式 {{ record.transactionMethod }}</div>
                <div class="record_amount">金額 {{ record.transactionAmount }}</div>
            </div>
        </div>
      </template>
    </MbForm>
  </template>
  
  <script>
  import MbForm from '@/components/member_center/form_style.vue';
    const valueRecord = [
        {
            transactionId: '111102',
            transactionDate: '2023/07/01 18:00',
            transactionMethod: '信用卡儲值',
            transactionAmount: 'NTD$1000',
        },
        {
            transactionId: '111103',
            transactionDate: '2023/07/02 18:00',
            transactionMethod: '信用卡儲值',
            transactionAmount: 'NTD$500',
        },
        {
            transactionId: '111103',
            transactionDate: '2023/07/03 13:00',
            transactionMethod: '信用卡儲值',
            transactionAmount: 'NTD$300',
        },
        {
            transactionId: '111105',
            transactionDate: '2023/07/05 19:00',
            transactionMethod: '信用卡儲值',
            transactionAmount: 'NTD$2000',
        },
        {
            transactionId: '111106',
            transactionDate: '2023/07/07 19:00',
            transactionMethod: '信用卡儲值',
            transactionAmount: 'NTD$670',
        },
    ];
    export default {
        components: {
            MbForm,
        },
        data() {
            return {
                title: '儲值金交易紀錄',
                transactionRecords: [],
            };
        },
        methods: {
            triggerParent() {
                this.$emit('emit-title','');
            }
        },
        created() {
            // 將假資料載入交易紀錄
            this.transactionRecords = valueRecord;
            this.$emit('emit-title',this.title);
        },
    };
  </script>