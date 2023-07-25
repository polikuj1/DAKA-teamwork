<template>
  <div class="home">
    <div class="home_game" @click="this.$router.push('/game')">
      <img src="@/assets/images/home/game.svg" alt="小遊戲圖">
    </div>
    <Hero @emit-go="goDown"/>
    <Banner/>
    <Services></Services>
    <Meals/>
    <Map></Map>
    <News/>
    <SocialMedia/>
  </div>
</template>

<script>
import Hero from '@/components/home/Hero.vue';
import Banner from '@/components/home/BannerSlide.vue';
import Services from '@/components/home/Services.vue';
import Meals from '@/components/home/Meal.vue';
// import Map from '@/components/home/Map.vue';
import News from '@/components/home/news.vue';
import SocialMedia from '@/components/home/SocialMedia.vue';
export default {
  name: '',
  data() {
    return {
      
    }
  },
  methods: {
    goDown() {
      console.log(window.scrollY);
      window.scrollTo(0, 1000);
    }
  },
  computed: {

  },
  components: {
    Services, News, Meals, Banner, Map, Hero, SocialMedia,
  },
}
</script>

<style lang="scss" scoped>

</style>
