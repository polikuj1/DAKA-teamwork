<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <div class="comic">
    <comicCard />
    <!-- <ComicSwiper /> -->
  </div>
</template>


<script>
import PageTitle from '@/components/PageTitle.vue';
import comicCard from '@/components/comic/ComicCard.vue';
import ComicSwiper from '@/components/comic/ComicSwiper.vue';
export default {
  components: {
    comicCard, ComicSwiper, PageTitle,
  },
  data() {
    return {
      title: '漫畫查詢',
    }
  },
}
</script>