<template>
    <Space size="large" wrap class="reservation_date">
        <DatePicker type="date" placeholder="Select date" v-model="selectedDate" @mouseleave="convertDate" />
        <TimePicker type="timerange" placement="bottom-end" placeholder="Select time" style="width: 168px" v-model="selectedTime" @mouseleave="convertTime"
        />

      </Space>


</template>
<style>

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
  this.$emit('convertDate',this.selectedDate);
},
convertTime(){
  this.$emit('convertTime',this.selectedTime);
}
}
}
</script>