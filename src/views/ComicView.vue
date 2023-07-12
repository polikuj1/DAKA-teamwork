<template>
  <div class="comic">
    <comicSearch />
    <comicCard />
  </div>
</template>


<script>
import comicSearch from '@/components/comic/search.vue';
import comicCard from '@/components/comic/ComicCard.vue';
export default {
  components: {
    comicSearch, comicCard,
  },
  data() {
    return {
      test: 132,
    }
  },
}
</script>