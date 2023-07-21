<template>
    <MbForm>
      <template v-slot:mb_form_title>
        <h3>儲值金交易紀錄</h3>
      </template>
      <template v-slot:mb_content>
        <div class="value_record">
            <div class="record_card" v-for="record in transactionRecords" :key="record.transactionId">
                <p class="record_id">交易序號 {{ record.transactionId }}</p>
                <p class="record_date">{{ record.transactionDate }}</p>
                <p class="record_method">儲值方式 {{ record.transactionMethod }}</p>
                <p class="record_amount">金額 {{ record.transactionAmount }}</p>
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
            transactionRecords: [],
            };
        },
        created() {
            // 將假資料載入交易紀錄
            this.transactionRecords = valueRecord;
        },
    };
  </script>