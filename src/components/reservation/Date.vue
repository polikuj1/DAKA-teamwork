<template>
    <Space size="large" wrap class="reservation_date">
        <DatePicker type="date" placeholder="Select date" v-model="selectedDate" />
        <TimePicker type="timerange" placement="bottom-end" placeholder="Select time" style="width: 168px" v-model="selectedTime"
        />
   {{ selectedDate }}, {{ selectedTime }}
      </Space>


</template>
<style>
.reservation_date{
  display: flex;
   
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
  this.$emit(selectedDate);
}
}
}
</script>