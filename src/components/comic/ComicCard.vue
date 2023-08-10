<template>
  <comicSearch @emit-txt="getSearch"></comicSearch>
  <div class="comic_type">
    <!-- <span @click="searchType('全部')" :class="{active: type === currentType}">全部</span> -->
    <span v-for="type in comicType" :key="type" @click="searchType(type)" :class="{active: type === currentType}">{{ type }}</span>
  </div>
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
      <div class="card" v-for="item in comicData" :key="item.comics_id"
      v-show="comicData.length">
        <div class="pic"  @click="this.$router.push(`/comic_detail/${item.comics_id}`)">
          <!-- <img :src="item.img" alt="漫畫封面"> -->
          <Images :imgURL="`comic/${item.img}`" :alt="`${item.title}`"/>
        </div>
        <div class="txt">
          <div class="title">
            <h4>{{ item.title }} {{ item.index }}</h4>
            <span>{{ item.author }}</span>
          </div>
          <button @click="reserve(item)" :class="{bt_hover: item.comics_id != 1 }">{{ item.comics_id==="1"? '已被預約' : '預約此書'}} <i class="fa-solid fa-book-open-reader"></i></button>
        </div>
      </div>
      <div class="warn_txt" v-if="comicData.length === 0">
        請重新搜尋!!
      </div>
    </main>
  </div>
  <Pagination
  :page="totalPage"
  @emit-page="renderComic"
  @prev-page="prevOrNext"
  @next-page="prevOrNext"
  v-show="paginationSwitch"/>
  <CartIcon/>
</template>

<script>
// import {GET} from '@/plugin/axios';
import Pagination from '@/components/Pagination.vue';
import comicSearch from '@/components/comic/search.vue';
import CartIcon from '@/components/comic/CartIcon.vue';
export default {
  components: {
    comicSearch, CartIcon, Pagination,
  },
  name: 'ComicCard',
  data() {
    return {
      originData: [],
      comicData: [],
      search: '',
      reservation: [],
      totalPage: null,
      pageData: 9,
      currentPage: 1,
      paginationSwitch: true,
      comicType: [],
      currentType: '全部',
    }
  },
  methods: {
    searchType(type) {
      this.comicData = [];
      this.currentType = type;
      this.comicData = this.originData.filter(item => item.type === type);
      if(type === '全部') {
        this.paginationSwitch = true;
        this.renderComic(this.currentPage);
      } else {
        this.paginationSwitch = false;
      }
    },
    getSearch(txt) {
      this.search = txt;
      if (this.search === '') {
        this.renderComic(this.currentPage);
        this.currentPage = 1;
        this.paginationSwitch = true;
        return;
      }
      this.comicData = this.originData.filter(item => item.title.includes(this.search));
      // this.totalPage = Math.ceil(this.comicData.length / 9);
      this.paginationSwitch = false;
    },
    reserve(item) {
      if(item.comics_id === '1') return;
      console.log(this.$store.state.cart);
      if(this.$store.state.cart.length === 5) return;
      if(this.$store.state.cart.indexOf(item) === -1) {
        console.log(123);
        this.$store.commit('getBook',item);
      } else {
        console.log('可惡');
      }
    },
    renderComic(num) {
      console.log(num);
      this.comicData = [];
      this.currentPage = num;
      this.originData.forEach((item,index) => {
        if(index < this.pageData * num && index >= (num -1) * this.pageData) {
          this.comicData.push(item);
        }
      })
      window.scrollTo(0,300);
    },
    prevOrNext(num) {
      console.log(typeof num);
      if(this.currentPage === 1 && num === -1) return;
      if(this.currentPage === this.totalPage && num === 1) return;
      this.currentPage += num;
      this.renderComic(this.currentPage);
    }
  },
  computed: {

  },
  created() {
    this.axios.get(`${this.$URL}/getAllComic.php`)
      .then((res) => {
        console.log(res);
        this.originData = res.data;
        // 處理漫畫的類型有哪些
        this.comicType.push('全部');
        this.originData.forEach(item => {
          if(this.comicType.indexOf(item.type) === -1) {
            this.comicType.push(item.type);
          }
        })
        this.totalPage = Math.ceil(res.data.length / 9);
        this.renderComic(this.currentPage)
      })
      .catch((err) => {
        console.log(err);
      })
  },
}
</script>