<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <PopularMeals/>
  <VariousMeal/>
  <div>
    
  </div>
</template>

<script>
import PageTitle from '@/components/PageTitle.vue';
import PopularMeals from '@/components/food_intro/PopularMeals.vue';
import VariousMeal from '@/components/food_intro/VariousMeal.vue';

export default {
  components: {
    PageTitle, PopularMeals, VariousMeal,
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