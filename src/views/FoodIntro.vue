<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <PopularMeals/>
  <div>
    
  </div>
</template>

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