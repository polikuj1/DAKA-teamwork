<template>
  <comicSearch @emit-txt="getSearch"/>
  <div class="search_result" v-show="search">
    &ldquo;{{ search }}&rdquo; 共有 {{ comicData.length }} 筆符合的漫畫
  </div>
  <main class="wrap">
    <div class="circle_top">
      <div></div>
    </div>
    <div class="circle_bottom">
      <div></div>
    </div>
    <div class="card" v-for="item in comicData" :keys="item.title" 
    v-show="comicData.length">
      <div class="pic"  @click="this.$router.push('/comic_detail')">
        <img :src="item.img">
      </div>
      <div class="txt">
        <div class="title">
          <h4>{{ item.title }} {{ item.index }}</h4>
          <span>{{ item.author }}</span>
        </div>
        <button>預約此書 <i class="fa-solid fa-book-open-reader"></i></button>
      </div>
    </div>
    <div class="warn_txt" v-if="comicData.length === 0">
      請重新搜尋!!
    </div>
  </main>
</template>

<script>
import comicSearch from '@/components/comic/search.vue';
import comicData from '@/assets/js/comicInfo.js';
export default {
  components: {
    comicSearch,
  },
  name: 'ComicCard',
  data() {
    return {
      comicData,
      search: '',
    }
  },
  methods: {
    getSearch(txt) {
      this.search = txt;
      if (this.search === '') {this.comicData = comicData;}
      this.comicData = comicData.filter(item => item.title.includes(this.search));
    }
  },
  computed: {

  },
  created() {
    
  },
}
</script>