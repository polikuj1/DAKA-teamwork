<template>
  <Space size="large" wrap class="reservation_date_time">
    <DatePicker size="large" type="date" placeholder="Select date" v-model="selectedDate" @on-change="convertDate"
      :options="options1" />
    <TimePicker size="large" type="timerange" :steps="[1, 60, 60]" placement="bottom-end" placeholder="Select time"
      style="width: 168px" v-model="selectedTime" @on-change="convertTime" />
  </Space>
</template>
<style>
.reservation_date_time {
  display: flex;
  justify-content: center;
  padding: 0 50px;


}
</style>
<script>

export default {



  data() {

    return {
      selectedDate: '',
      selectedTime: '',
      options1: {
        disabledDate(date) {
          const today = new Date();
          today.setHours(0, 0, 0, 0); // Set time to midnight
          return date.valueOf() <= today.valueOf();
        }
      },
     
    }
  },
  computed() {


  },
  methods: {
    convertDate() {
      this.$emit('convert-date', this.selectedDate);
    },
    convertTime() {
      this.$emit('convert-time', this.selectedTime);
    }
  }
}
</script>