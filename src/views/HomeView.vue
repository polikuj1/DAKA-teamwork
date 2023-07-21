<template>
  <div class="home">
    <Banner/>
    <Services></Services>
    <Meals/>
    <News/>
  </div>
</template>

<script>
import Banner from '@/components/home/BannerSlide.vue';
import Services from '@/components/home/Services.vue';
import Meals from '@/components/home/Meal.vue';
// import Map from '@/components/home/Map.vue';
import News from '@/components/home/news.vue';
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
    Services, News, Meals, Banner,
  },
  mounted() {
    
  },
}
</script>
