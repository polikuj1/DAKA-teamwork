<template>
  <div class="home">
    <Hero />
    <Banner/>
    <Services></Services>
    <Meals/>
    <News/>
    <Socialmedia/>
  </div>
</template>

<script>
import Hero from '@/components/home/Hero.vue';
import Banner from '@/components/home/BannerSlide.vue';
import Services from '@/components/home/Services.vue';
import Meals from '@/components/home/Meal.vue';
// import Map from '@/components/home/Map.vue';
import News from '@/components/home/news.vue';
import Socialmedia from '@/components/home/SocialMedia.vue';
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
    Services, News, Meals, Banner, Hero, Socialmedia,
  },
  mounted() {
    
  },
}
</script>

<style lang="scss" scoped>

</style>
