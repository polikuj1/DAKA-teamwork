<template>
  <div class="home">
    <Hero />
    <Banner/>
    <Services></Services>
    <Meals/>
    <News/>
  </div>
</template>

<script>
import Hero from '@/components/home/Hero.vue';
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
    Services, News, Meals, Banner, Hero,
  },
}
</script>

<style lang="scss" scoped>

</style>
