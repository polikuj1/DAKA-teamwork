<template>
  <section>
    <div class="bookcontainer">
      <!-- Codrops top bar -->
      <h3 class="title">\ {{ booksarea.booksTitle }} /</h3>
      <div class="main">
        <ul id="bk-list" class="bk-list clearfix">
          <!-- 第一本 -->
          <li v-for="item in booksarea.booksDetails"
              :key="item">
            <div class="bk-book book-1">
              <div class="bk-front">
                <div class="bk-cover-back"></div>
                <div class="bk-cover">
                  <img class="imgsize" :src="item.img" />
                </div>
              </div>
              <div class="bk-page">
                <div class="bk-content bk-content-current">
                  <div class="imgarea">
                    <img class="imgsize" :src="item.comics_readfirst" />
                  </div>
                </div>
                <div class="bk-content">
                  <p>{{ item.intro }}</p>
                </div>
              </div>
              <div class="bk-back">
                <p>{{ item.intro }}</p>
              </div>
              <div class="bk-right"></div>
              <div class="bk-left">
                <h2>
                  <span class="text">
                    <template v-for="(i, idx) in item.title" :key="idx">
                      {{ i }}<br>
                    </template>
                  </span>
                  <span class="text">{{ item.comics_index }}</span>
                  <span>{{ item.author }}</span>
                </h2>
              </div>
              <div class="bk-top"></div>
              <div class="bk-bottom"></div>
            </div>
          </li>
        </ul>
      </div>
      <div class="bookshelf"></div>
    </div>
  </section>
</template>

<style>
@import "@/assets/scss/layout/comic/comic_bookactive.scss";
</style>

<script>
import PageTitle from "@/components/PageTitle.vue";

// import '@/assets/js/modernizr.custom.js';
// import '@/assets/js/books2.js';
// var transEndEventNames = {
// 	'WebkitTransition' : 'webkitTransitionEnd',
// 	'MozTransition' : 'transitionend',
// 	'OTransition' : 'oTransitionEnd',
// 	'msTransition' : 'MSTransitionEnd',
// 	'transition' : 'transitionend'
// };

// var transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ];

// var $books = $('#bk-list > li > div.bk-book');
// var booksCount = $books.length;
// var currentbook = -1;

// import '@/assets/js/modernizr.custom.js';

// import Modernizr from 'modernizr';
import Books from "@/assets/js/books2.js";

export default {
  components: {
    PageTitle,
  },
  data() {
    return {
      booksarea: {
        booksTitle: "熱門漫畫",
        booksDetails: [
          {
            img: require('@/assets/images/comic/img/009.png'),
            comics_readfirst:require('@/assets/images/comic/comics_readfirst/RD009.webp'),
            title: "鬼滅之刃",
            comics_index: "08",
            author: "吾峠呼世晴",
            intro:
              "炭治郎他們跟著「音柱」宇髓天元一起前往鬼棲息的花街柳巷。天元3位身為女忍者的老婆，前往該處收集情報時失蹤了。炭治郎他們為了進行調查而男扮女裝潛入，卻始終找不到鬼的棲息地。就在此時，鬼的魔掌伸向花魁們！炭治郎一行人能夠找到鬼嗎？",
            comics_hot: "1",
          },
          {
            img: require('@/assets/images/comic/img/010.png'),
            comics_readfirst:require('@/assets/images/comic/comics_readfirst/RD010.webp'),
            title: "鬼滅之刃",
            comics_index: "09",
            author: "吾峠呼世晴",
            intro:
              "炭治郎他們跟著「音柱」宇髓天元一起前往鬼棲息的花街柳巷。天元3位身為女忍者的老婆，前往該處收集情報時失蹤了。炭治郎他們為了進行調查而男扮女裝潛入，卻始終找不到鬼的棲息地。就在此時，鬼的魔掌伸向花魁們！炭治郎一行人能夠找到鬼嗎？",
            comics_hot: "1",
          },
          {
            img: require('@/assets/images/comic/img/011.png'),
            comics_readfirst:require('@/assets/images/comic/comics_readfirst/RD011.webp'),
            title: "鬼滅之刃",
            comics_index: "10",
            author: "吾峠呼世晴",
            intro:
              "花魁之鬼‧墮姬控制了花街！墮姬與原本分別具有力量的腰帶合而為一，以增強的力量攻擊炭治郎！炭治郎以火神神樂來應戰，卻因此超出了極限？禰豆子跟宇髓接替炭治郎與敵人對峙，然而與上弦之鬼墮姬的戰鬥，後續的發展卻出人意料？",
            comics_hot: "1",
          },
          {
            img: require('@/assets/images/comic/img/012.png'),
            comics_readfirst:require('@/assets/images/comic/comics_readfirst/RD012.webp'),
            title: "鬼滅之刃",
            comics_index: "11",
            author: "吾峠呼世晴",
            intro:
              "炭治郎等人在花街與上弦之陸的兄妹檔‧妓夫太郎跟墮姬作戰，打得相當激烈。儘管他們跟柱‧宇髓的合作逐漸順手，但是宇髓、伊之助和善逸卻遭到鬼的武器打倒。如今同伴們都已倒下，炭治郎能夠打敗這兩個鬼嗎？",
            comics_hot: "1",
          },
          {
            img: require('@/assets/images/comic/img/013.png'),
            comics_readfirst:require('@/assets/images/comic/comics_readfirst/RD013.webp'),
            title: "鬼滅之刃",
            comics_index: "12",
            author: "吾峠呼世晴",
            intro:
              "相隔113年又有上弦之鬼犧牲，憤怒的無慘對剩下的上弦之鬼們下達進一步的命令！另一方面，鋼鐵塚因為炭治郎跟妓夫太郎戰鬥造成刀子捲刃而相當憤怒。為了得到全新的刀，炭治郎造訪了鋼鐵塚所在的刀匠故鄉…？",
            comics_hot: "1",
          },
          {
            img: require('@/assets/images/comic/img/014.png'),
            comics_readfirst:require('@/assets/images/comic/comics_readfirst/RD014.webp'),
            title: "庫洛魔法使",
            comics_index: "01",
            author: "CLAMP",
            intro:
              "櫻花盛開的４月，小櫻升上中學１年級了。與心愛的小狼重逢、今後能夠一起去上學，讓她臉上綻放出燦爛笑容。但是當她從不可思議的夢中醒來，卻發現小櫻牌出現異變…全世界都在期待的新章「透明牌篇」，終於開幕！",
            comics_hot: "1",
          },
          {
            img: require('@/assets/images/comic/img/015.png'),
            comics_readfirst:require('@/assets/images/comic/comics_readfirst/RD015.webp'),
            title: "庫洛魔法使",
            comics_index: "02",
            author: "CLAMP",
            intro:
              "新的卡牌與加深的謎團…！全世界都在期待的新章「透明牌篇」第2集！夢裡所看見的透明卡牌，於友枝町再次引發許多不可思議的事件。小櫻利用在夢中得到的『鑰匙』，接連獲得新的卡牌！這個時候，有一位女孩轉學進入小櫻的班級…？",
            comics_hot: "1",
          },
          {
            img: require('@/assets/images/comic/img/016.png'),
            comics_readfirst:require('@/assets/images/comic/comics_readfirst/RD016.webp'),
            title: "庫洛魔法使",
            comics_index: "03",
            author: "CLAMP",
            intro:
              "交到了新朋友的小櫻，每天過著忙碌卻充滿歡樂的生活。然而就在大家一起快樂吃晚餐的時候，小櫻再次陷入可怕又奇異的黑暗之中…伴隨著時鐘一同出現的神秘人物，究竟想告訴小櫻什麼事？",
            comics_hot: "1",
          },
          {
            img: require('@/assets/images/comic/img/017.png'),
            comics_readfirst:require('@/assets/images/comic/comics_readfirst/RD017.webp'),
            title: "庫洛魔法使",
            comics_index: "04",
            author: "CLAMP",
            intro:
              "小櫻追蹤讓秋穗睡著的「輕飄飄」，再次得到新的卡牌。她似乎從這些透明的卡牌上察覺到什麼…？某天，小櫻來到桃矢打工的地方。她和一起在這裡打工的雪兔聊天時，2人竟然不慎誤入突然出現的迷宮？",
            comics_hot: "1",
          },
          {
            img: require('@/assets/images/comic/img/018.png'),
            comics_readfirst:require('@/assets/images/comic/comics_readfirst/RD018.webp'),
            title: "庫洛魔法使",
            comics_index: "05",
            author: "CLAMP",
            intro:
              "透明的卡牌、不可思議的夢、穿著長袍的人。真相之門，即將開啟｜｜星期天有約，這次終於能和小狼一起吃便當了！小櫻正在努力做菜。不過，曾爺爺說「有東西要交給妳」，於是小櫻和小狼一起到曾爺爺家拜訪！而小櫻的母親，在這裡再次現身…？｜｜一切謎團開始轉動的第5集！",
            comics_hot: "1",
          },
        ],
      },
    };
  },
  computed: {},
  methods: {},
  mounted() {
    Books().init();
  },
};
</script>
