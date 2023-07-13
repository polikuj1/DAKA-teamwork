<template>
  <div class="comic">
    <comicCard />
    <ComicSlider />
  </div>
</template>


<script>
import comicCard from '@/components/comic/ComicCard.vue';
import ComicSlider from '@/components/comic/ComicSlider.vue';
export default {
  components: {
    comicCard, ComicSlider
  },
  data() {
    return {
      test: 132,
    }
  },
}
</script>