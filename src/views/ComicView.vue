<template>
  <div class="comic">
    <comicCard />
  </div>
</template>


<script>
import comicCard from '@/components/comic/ComicCard.vue';
export default {
  components: {
    comicCard,
  },
  data() {
    return {
      test: 132,
    }
  },
}
</script>