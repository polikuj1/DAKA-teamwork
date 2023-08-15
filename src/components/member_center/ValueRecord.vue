<template>
    <MbForm @emit-back="triggerParent">
      <template v-slot:mb_form_title>
        <h3>{{ title }}</h3>
      </template>
      <template v-slot:mb_content>
        <div class="value_record" v-for="record in transactionRecords" :key="record.transactionId">
            <div class="record_list">
                <div class="record_id">交易序號 {{ record.sto_no }}</div>
                <div class="record_date">{{ record.sdate }}</div>
            </div>
            <div class="record_content">
                <div class="record_method">儲值方式 {{ record.add_method=== '1'? '信用卡儲值' : '現金儲值' }}</div>
                <div class="record_amount">金額 {{ record.sval }}</div>
            </div>
        </div>
      </template>
    </MbForm>
  </template>
  
  <script>
//   import {GET} from '@/plugin/axios';
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
            const params = {
            id: this.$store.state.member.mem_id
            };
            console.log(params);
            this.axios.get(`${this.$URL}/getValueRecord.php`,{params: params})
                .then((res) => {
                console.log(res);
                this.transactionRecords = res.data;
                })
                .catch((err) => {
                console.log(err);
                })
        },
    };
  </script>