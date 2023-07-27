<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <div>
    漫畫展示
  </div>
  <ComicSwiper/>
  <!-- <CartIcon /> -->
</template>

<script>
import PageTitle from '@/components/PageTitle.vue';
import CartIcon from '@/components/comic/CartIcon.vue';
import ComicSwiper from '@/components/comic/ComicSwiper.vue';

export default {
  components: {
    PageTitle, ComicSwiper,
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