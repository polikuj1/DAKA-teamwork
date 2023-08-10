<template>
  <section>
    <div class="bookcontainer">
      <!-- Codrops top bar -->
      <div class="main">
        <ul id="bk-list" class="bk-list clearfix">
          <li>
            <div class="bk-book book-1">
              <div class="bk-front">
                <div class="bk-cover">
                  <img class="imgsize" src="../../assets/images/comic/01.png">
                </div>
                <div class="bk-cover-back"></div>
              </div>
              <div class="bk-page">
                <div class="bk-content bk-content-current">
                  <img class="imgsize" src="../../assets/images/comic/RD017.webp">
                </div>
                <div class="bk-content">
                    <p>
                    　　在新卡牌的引領下， 　　尋找謎底的小櫻飛向天際！
                    　　小櫻追蹤讓秋穗睡著的「輕飄飄」， 　　再次得到新的卡牌。
                    　　她似乎從這些透明的卡牌上察覺到什麼…？
                    　　某天，小櫻來到桃矢打工的地方。
                    　　她和一起在這裡打工的雪兔聊天時，
                    　　2人竟然不慎誤入突然出現的迷宮－－？
                  </p>
                </div>
                <div class="bk-content">
                  <p>
                    Trahira giant wels cutlassfish snapper koi blackchin
                    mummichog mustard eel rock bass whiff murray cod. Bigmouth
                    buffalo ling cod giant wels, sauger pink salmon. Clingfish
                    luderick treefish flatfish Cherubfish oldwife Indian mul
                    gizzard shad hagfish zebra danio. Butterfly ray lizardfish
                    ponyfish muskellunge Long-finned sand diver mullet swordfish
                    limia ghost carp filefish.
                  </p>
                </div>
              </div>
              <div class="bk-back">
                <p>
                  In this nightmare vision of cats in revolt, fifteen-year-old
                  Alex and his friends set out on a diabolical orgy of robbery,
                  rape, torture and murder. Alex is jailed for his teenage
                  delinquency and the State tries to reform him - but at what
                  cost?
                </p>
              </div>
              <div class="bk-right"></div>
              <div class="bk-left">
                <h2>
                  <span>庫洛魔法使 透明牌篇 4</span>
                  <span>作者： CLAMP</span>
                </h2>
              </div>
              <div class="bk-top"></div>
              <div class="bk-bottom"></div>
            </div>
          </li>
        </ul>
        <div class="bookshelf"></div>
      </div>
    </div>
  </section>
</template>

<style>
/* @import "@/assets/scss/layout/comic/comic_bookactive.scss"; */
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
    return {};
  },
  computed: {},
  methods: {},
  mounted() {
    Books().init();
  },
};
</script>
