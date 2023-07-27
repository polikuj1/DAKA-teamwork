<template>
  <comicSearch @emit-txt="getSearch"/>
  <div class="search_result" v-show="search">
    &ldquo;{{ search }}&rdquo; 共有 {{ comicData.length }} 筆符合的漫畫
  </div>
  <div class="comic_card_wrap">
    <div class="circle_top">
      <div></div>
    </div>
    <div class="circle_bottom">
      <div></div>
    </div>
    <main class="wrap">
      <div class="card" v-for="item in comicData" :key="item.title"
      v-show="comicData.length">
        <div class="pic"  @click="this.$router.push(`/comic_detail/${item.id}`)">
          <img :src="item.img" alt="漫畫封面">
        </div>
        <div class="txt">
          <div class="title">
            <h4>{{ item.title }} {{ item.index }}</h4>
            <span>{{ item.author }}</span>
          </div>
          <button @click="reserve(item)">預約此書 <i class="fa-solid fa-book-open-reader"></i></button>
        </div>
      </div>
      <div class="warn_txt" v-if="comicData.length === 0">
        請重新搜尋!!
      </div>
    </main>
  </div>
  <CartIcon/>
</template>

<script>
import comicSearch from '@/components/comic/search.vue';
import CartIcon from '@/components/comic/CartIcon.vue';
export default {
  components: {
    comicSearch, CartIcon,
  },
  name: 'ComicCard',
  data() {
    return {
      originData: [],
      comicData: [],
      search: '',
      reservation: [],
    }
  },
  methods: {
    getSearch(txt) {
      this.search = txt;
      if (this.search === '') {this.comicData = this.originData;}
      this.comicData = this.originData.filter(item => item.title.includes(this.search));
    },
    reserve(item) {
      console.log(this.$store.state.cart);
      if(this.$store.state.cart.length === 5) return;
      if(this.$store.state.cart.indexOf(item) === -1) {
        console.log(123);
        this.$store.commit('getBook',item);
      } else {
        console.log('可惡');
      }
    },
  },
  computed: {

  },
  created() {
    this.axios.get('/data/comic.json')
      .then((res) => {
        this.originData = res.data;
        this.comicData = res.data;
        // this.reservation = this.$store.state.cart;
      })
      .catch((err) => {
        console.log(err);
      })
  },
}
</script>