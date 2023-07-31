<template>
  <PageTitle>
    {{ title }}
  </PageTitle>

  <ComicBookactive/>
  <ComicSwiper/>
  <div>
    
  </div>
  <!-- <CartIcon /> -->
</template>

<script>
import PageTitle from '@/components/PageTitle.vue';
import CartIcon from '@/components/comic/CartIcon.vue';
import ComicBookactive from '@/components/comic/ComicBookactive.vue';
import ComicSwiper from '@/components/comic/ComicSwiper.vue';

export default {
  components: {
    PageTitle, ComicBookactive, ComicSwiper,
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