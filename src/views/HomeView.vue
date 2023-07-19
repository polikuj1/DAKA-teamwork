d<template>
  <div class="home">
    <Services></Services>
    <Meals/>
  </div>
</template>

<script>
import Services from '@/components/home/Services.vue';
import Meals from '@/components/home/Meal.vue';
export default {
  name: '',
  data() {
    return {
      
    }
  },
  methods: {

  },
  computed: {

  },
  components: {
    Services, Meals,
  },
  mounted() {
    
  },
}
</script>
