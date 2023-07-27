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
            this.$emit('emit-title',this.title);
            this.axios.get('/data/value_record.json')
            .then((res) => {
            this.transactionRecords = res.data;
            })
            .catch((err) => {
            console.log(err);
            })
        },
    };
  </script>