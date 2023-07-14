<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <div class="comic">
    <comicCard />
    <ComicSlider />
  </div>
</template>


<script>
import PageTitle from '@/components/PageTitle.vue';
import comicCard from '@/components/comic/ComicCard.vue';
import ComicSlider from '@/components/comic/ComicSlider.vue';
export default {
  components: {
    comicCard, ComicSlider, PageTitle,
  },
  data() {
    return {
      title: '漫畫查詢',
    }
  },
}
</script>