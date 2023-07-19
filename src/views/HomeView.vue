d<template>
  <div class="home">
    <Services></Services>
    <Meals/>
    <News/>
  </div>
</template>

<script>
import Services from '@/components/home/Services.vue';
import Meals from '@/components/home/Meal.vue';
import News from '@/components/home/News.vue';
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
    Services,
  },
  mounted() {
    
  },
}
</script>
