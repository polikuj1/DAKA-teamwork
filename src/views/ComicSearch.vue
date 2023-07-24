<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <div class="comic">
    <comicCard />
  </div>
</template>


<script>
import PageTitle from '@/components/PageTitle.vue';
import comicCard from '@/components/comic/ComicCard.vue';
export default {
  components: {
    comicCard, PageTitle,
  },
  data() {
    return {
      title: '漫畫租借',
    }
  },
}
</script>