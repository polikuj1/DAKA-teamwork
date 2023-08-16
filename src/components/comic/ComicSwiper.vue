<template>
  <section class="comics_newin">
    <h3>\ 新進漫畫 /</h3>
    <div class="comics_slides">
      <Carousel v-bind="settings" 
      :breakpoints="breakpoints" 
      :wrap-around="true"
      :autoplay="2000">

        <Slide v-for="item in comicData" :key="item.id">

          <div class="card">
            <div class="pic" @click="this.$router.push(`/comic_detail/${item.id}`)">
              <!-- <img :src="item.img" alt="漫畫封面"> -->
              <Images :imgURL="`comic/${item.img}`" :alt="`${item.title}`"/>
            </div>
            <div class="txt">
              <div class="title">
                <h4>{{ item.title }} {{ item.index }}</h4>
                <span>{{ item.author }}</span>
              </div>
            </div>
          </div>

        </Slide>

        <template #addons>
          <Navigation />
        </template>
      </Carousel>
    </div>
  </section>
</template>
<script>
import {GET} from '@/plugin/axios';
import { defineComponent } from 'vue'
import { Carousel, Navigation, Slide } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css';

export default defineComponent({
  components: {
    Carousel,
    Slide,
    Navigation,
  },
  data: () => ({

    comicData: [
      {
        "id": 1,
        "title": "水星の魔女",
        "author": "東條チカ, 米山昂, HISADAKE, 矢立肇・富野由悠季",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/1.webp",
        "index": "01"
      },
      {
        "id": 2,
        "title": "火影忍者",
        "author": "岸本斉史",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/2.webp",
        "index": "01"
      },
      {
        "id": 3,
        "title": "我推的孩子",
        "author": "赤坂アカ, 横槍メンゴ",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/3.webp",
        "index": "01"
      },
      {
        "id": 4,
        "title": "咒術迴戰",
        "author": "芥見下々",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/jyujyutsu01.webp",
        "index": "01"
      },
      {
        "id": 5,
        "title": "咒術迴戰",
        "author": "芥見下々",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/jyujyutsu02.png",
        "index": "02"
      },
      {
        "id": 6,
        "title": "咒術迴戰",
        "author": "芥見下々",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/jyujyutsu03.png",
        "index": "03"
      },
      {
        "id": 7,
        "title": "咒術迴戰",
        "author": "芥見下々",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/jyujyutsu04.png",
        "index": "04"
      },
      {
        "id": 8,
        "title": "咒術迴戰",
        "author": "芥見下々",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/jyujyutsu01.webp",
        "index": "05"
      },
      {
        "id": 9,
        "title": "咒術迴戰",
        "author": "芥見下々",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/jyujyutsu02.png",
        "index": "06"
      },
      {
        "id": 10,
        "title": "咒術迴戰",
        "author": "芥見下々",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/jyujyutsu03.png",
        "index": "07"
      },
      {
        "id": 11,
        "title": "咒術迴戰",
        "author": "芥見下々",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/jyujyutsu04.png",
        "index": "08"
      },
      {
        "id": 12,
        "title": "咒術迴戰",
        "author": "芥見下々",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/jyujyutsu01.webp",
        "index": "09"
      },
      {
        "id": 13,
        "title": "鬼滅之刃",
        "author": "吾峠呼世晴",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/5.webp",
        "index": "01"
      },
      {
        "id": 14,
        "title": "間諜家家酒",
        "author": "遠藤達哉",
        "intro": "澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！",
        "translator": "張紹仁",
        "publisher": "東立",
        "date": "2023/01/06",
        "language": "繁體中文",
        "img": "/comic/6.webp",
        "index": "01"
      }
    ],
    data:[],
    // carousel settings
    settings: {
      itemsToShow: 1,
      snapAlign: 'center',
    },
    // breakpoints are mobile first
    breakpoints: {
      // 700px and up
      700: {
        itemsToShow: 3,
        snapAlign: 'center',
      },
      // 1024 and up
      1024: {
        itemsToShow: 3,
        snapAlign: 'center',
      },
    },
  }),
  created() {
    // GET('/data/comic.json')
    GET(`${this.$URL}/getAllComic.php`)
      .then((res) => {
        console.log(res);
        this.comicData = this.data = res;
      })
      .catch((err) => {
        console.log(err);
      })
  },
  // created() {
  //   this.axios.get(`${this.$URL}/getAllComic.php`)
  //     .then(res => {
  //       console.log(res);
  //       this.comicData = res.data;
  //     })
  //     .catch(err => {
  //       console.log(err);
  //     })
  // },
})
</script>