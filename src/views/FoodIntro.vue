<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <PopularMeals/>
  <div>
    
  </div>
</template>
<style>
@import '@/assets/scss/page/food_intro.scss';
</style>
<script>
import PageTitle from '@/components/PageTitle.vue';
import PopularMeals from '@/components/food_intro/PopularMeals.vue';

export default {
  components: {
    PageTitle, PopularMeals,
  },
  data() {
    return {
      title: '餐點介紹',
    }
  },
  methods: {

  },
  computed: {

  },
}
</script>