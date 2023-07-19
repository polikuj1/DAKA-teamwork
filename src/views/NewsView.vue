<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <div id="news_container">
    <section class="news">
        <div class="news_tabs">
          <button class="news_tab" :class="{ active: currentTab === 'all' }" @click="changeTab('all')">全部消息</button>
          <button class="news_tab" :class="{ active: currentTab === 'latest' }" @click="changeTab('latest')">最新消息</button>
          <button class="news_tab" :class="{ active: currentTab === 'activity' }" @click="changeTab('activity')">活動消息</button>
        </div>
        <div class="news_tab_content">
          <!-- 全部消息 -->
          <div v-show="currentTab === 'all'">
            <a href="#">
              <div v-for="(message, index) in paginatedAllMessages" :key="message.id" class="message">
                <div class="news_pic">
                  <img :src="message.img" alt="Message Image" >
                </div>
                <div class="news_message_content">
                  <p class="news_category" :style="{ backgroundColor: message.category === 'NEWS' ? '#5AC4C4' : '#FF5E1E' }">{{ message.category }}</p>
                  <p class="news_date">{{ message.date }}</p>
                  <p class="news_title">{{ message.content }}</p>
                  <p class="news_more">view more</p>
                </div>
              </div>
            </a>
            <!-- 下一頁按鈕 -->
            <div class="news_pagination">
              <button @click="goToPreviousPage" :disabled="page === 1"><i class="fa-solid fa-arrow-left"></i></button>
              <span v-for="pageNumber in totalPages" :key="pageNumber">
                <button v-if="pageNumber === page" :class="{ active: pageNumber === page }">{{ pageNumber }}</button>
                <button v-else @click="goToPage(pageNumber)">{{ pageNumber }}</button>
              </span>
              <button @click="goToNextPage" :disabled="isLastPage"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>

          <!-- 最新消息 -->
          <div v-show="currentTab === 'latest'">
            <a href="#">
              <div v-for="(message, index) in paginatedlatestMessages" :key="message.id" class="message">
                <div class="news_pic">
                  <img :src="message.img" alt="Message Image">
                </div>
                <div class="news_message_content">
                  <p class="news_category" :style="{ backgroundColor: message.category === 'NEWS' ? '#5AC4C4' : '#FF5E1E' }">{{ message.category }}</p>
                  <p class="news_date">{{ message.date }}</p>
                  <p class="news_title">{{ message.content }}</p>
                  <p class="news_more">view more</p>
                </div>
              </div>
            </a>
            <!-- 下一頁按鈕 -->
            <div class="news_pagination">
              <button @click="goToPreviousPage" :disabled="page === 1"><i class="fa-solid fa-arrow-left"></i></button>
              <span v-for="pageNumber in totalPages" :key="pageNumber">
                <button v-if="pageNumber === page" :class="{ active: pageNumber === page }">{{ pageNumber }}</button>
                <button v-else @click="goToPage(pageNumber)">{{ pageNumber }}</button>
              </span>
              <button @click="goToNextPage" :disabled="isLastPage"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>
          <!-- 活動消息 -->
          <div v-show="currentTab === 'activity'">
            <a href="#">
              <div v-for="(message, index) in paginatedActivityMessages" :key="message.id" class="message">
                  <div class="news_pic">
                    <img :src="message.img" alt="Message Image">
                  </div>
                  <div class="news_message_content">
                    <p class="news_category" :style="{ backgroundColor: message.category === 'NEWS' ? '#5AC4C4' : '#FF5E1E' }">{{ message.category }}</p>
                    <p class="news_date">{{ message.date }}</p>
                    <p class="news_title">{{ message.content }}</p>
                    <p class="news_more">view more</p>
                  </div>
                </div>
            </a>
            <!-- 下一頁按鈕 -->
            <div class="news_pagination">
              <button @click="goToPreviousPage" :disabled="page === 1"><i class="fa-solid fa-arrow-left"></i></button>
              <span v-for="pageNumber in totalPages" :key="pageNumber">
                <button v-if="pageNumber === page" :class="{ active: pageNumber === page }">{{ pageNumber }}</button>
                <button v-else @click="goToPage(pageNumber)">{{ pageNumber }}</button>
              </span>
              <button @click="goToNextPage" :disabled="isLastPage"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>
        </div>
    </section>
  </div>
</template>

<script>
import PageTitle from '@/components/PageTitle.vue';
export default {
  components: {
    PageTitle,
  },
  data() {
    return {
      title: '最新消息',
      currentTab: 'all',
      allMessages: [
        {
          category:'ACTIVITY',
          img:require('@/assets/images/news/lol.png'),
          date:'2023-05-20',
          content:'🔥 組隊集結，征服召喚峽谷！快加入我們的英雄聯盟主題網咖組隊活動！'
        },
        {
          category:'ACTIVITY',
          img: require('@/assets/images/news/annual_01.png'),
          date:'2022-04-01',
          content:'🎉 超值年度回饋～打咖獻給忠實顧客的感謝之心！'
        }, {
          category:'NEWS',
          img: require('@/assets/images/news/comic_01.png'),
          date:'2022-10-01',
          content:'📚 全新服務上線！漫畫租借，讓你暢遊漫畫世界！'
        },
        {
          category:'ACTIVITY',
          img: require('@/assets/images/news/annual_02.png'),
          date:'2023-11-01',
          content:'🎁萬眾期待的抽獎活動開始了！抓住這個難得的機會，贏得豐富的獎品！'
        }, {
          category:'NEWS',
          img: require('@/assets/images/news/prize_04.png'),
          date:'2023-05-20',
          content:'🎉 新福利大放送，加入我們的會員團隊，享受獨特福利、遊戲時光！'
        },
        {
          category:'activity',
          img: require('@/assets/images/news/game_01.png'),
          date:'2023-01-01',
          content:'🎮加入我們的主題派對，探索遊戲的無限樂趣！'
        }, 
        {
          category:'NEWS',
          img: require('@/assets/images/news/open_01.png'),
          date:'2022-01-01',
          content:'🔥 新店開張！最新設備、最豪華環境，打造你的極致遊戲體驗！'
        },
        {
          category:'ACTIVITY',
          img: require('@/assets/images/news/game_02.png'),
          date:'2022-05-02',
          content:'💥 電競巔峰對決，共襄觀賽盛宴！在打咖一同見證頂尖選手的戰鬥與榮耀！'
        },
        {
          category:'NEWS',
          img: require('@/assets/images/news/prize_03.png'),
          date:'2023-02-20',
          content:'💰 每月特價日，享受超值優惠！讓你的遊戲時間更加划算！'
        },
        {
          category:'ACTIVITY',
          img: require('@/assets/images/news/prize_02.png'),
          date:'2023-01-20',
          content:'🌟 白鑽級會員活動，專屬活動邀請，尊享獨家福利！'
        },
        {
          category:'NEWS',
          img: require('@/assets/images/news/juice.png'),
          date:'2022-07-18',
          content:'☕️ 新品特色飲品上架！品味遊戲之餘，享受美味餐飲折扣！'
        },
        {
          category:'ACTIVITY',
          img: require('@/assets/images/news/game_06.png'),
          date:'2022-08-26',
          content:'💥 網咖聯賽，挑戰真正的電競巔峰，讓你的實力成就傳奇！'
        }
      ],
      latestMessages:[
     
      ],
      activityMessages:[
      
      ],
      page:1,
      isLastPage: false,

    }
  },
  methods: {
    changeTab(tabName) {
       this.currentTab = tabName;
       //分類消息類別
       if (tabName === 'latest') {
          this.latestMessages = this.allMessages.filter(message => message.category === 'NEWS');
        } else if (tabName === 'activity') {
          this.activityMessages = this.allMessages.filter(message => message.category === 'ACTIVITY');
        }
    },
    goToNextPage() {
      this.page++;
      this.isLastPage = this.page * 5 >= this.allMessages.length; // 檢查是否為最後一頁
    },

    goToPreviousPage() {
      this.page--;
      this.isLastPage = false; // 當切換上一頁時，不再被視為最後一頁
    },

    goToPage(pageNumber) {
      this.page = pageNumber;
      this.isLastPage = this.page * 5 >= this.allMessages.length; // 檢查是否為最後一頁
    },
  },
  computed: {
    paginatedAllMessages() {
    const startIndex = (this.page - 1) * 5;
    const endIndex = startIndex + 5;
    return this.allMessages.slice(startIndex, endIndex);
  },
    paginatedlatestMessages() {
      const startIndex = (this.page - 1) * 5;
      const endIndex = startIndex + 5;
      return this.latestMessages.slice(startIndex, endIndex);
    },
    paginatedActivityMessages() {
      const startIndex = (this.page - 1) * 5;
      const endIndex = startIndex + 5;
      return this.activityMessages.slice(startIndex, endIndex);
    },
    totalPages() {
        return Math.ceil(this.allMessages.length / 5); // 每頁顯示 5 則消息，計算總頁數
      },
    },
}
</script>