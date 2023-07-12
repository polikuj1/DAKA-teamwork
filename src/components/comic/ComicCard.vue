<template>
  <comicSearch @emit-txt="getSearch"/>
  <div class="wrap">
    <div class="card" v-for="item in comicData" :keys="item.title" v-if="comicData.length">
      <div class="pic">
        <img :src="item.img">
      </div>
      <div class="txt">
        <div class="title">
          <span>{{ item.title }}</span>
          <span>章節導覽</span>
        </div>
        <button>預約</button>
      </div>
    </div>
    <div class="warn_txt" v-else>
      找不到相關漫畫，請重新搜尋!!
    </div>
  </div>
</template>


<script type="module">
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