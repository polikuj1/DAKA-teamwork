<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <div>
    food
  </div>
</template>

<script>
import PageTitle from '@/components/PageTitle.vue';
export default {
  components: {
    PageTitle
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