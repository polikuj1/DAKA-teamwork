<template>
    <Space size="large" wrap class="reservation_date_time">
        <DatePicker type="date" placeholder="Select date" v-model="selectedDate" @mouseleave="convertDate" />
        <TimePicker type="timerange" :steps="[1, 60, 60]"  placement="bottom-end" placeholder="Select time" style="width: 168px" v-model="selectedTime" @mouseleave="convertTime"
        />
      </Space>


</template>
<style>

.reservation_date_time{
  margin: auto;
}
</style>
<script>

export default {



data(){
  
  return{
    selectedDate:'',
    selectedTime:'',
  }
},
computed(){
  

},
methods:{
convertDate(){
  this.$emit('convert-date',this.selectedDate);
},
convertTime(){
  this.$emit('convert-time',this.selectedTime);
}
}
}
</script>