<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <div>
    漫畫展示
  </div>
  <!-- <CartIcon /> -->
</template>

<script>
import PageTitle from '@/components/PageTitle.vue';
import CartIcon from '@/components/comic/CartIcon.vue';
export default {
  components: {
    PageTitle, 
    // CartIcon,
  },
  data() {
    return {
      title: '漫畫推薦',
    }
  },
  methods: {

  },
  computed: {

  },
}
</script>