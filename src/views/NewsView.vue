<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <div id="news_container">
    <section class="news_page">
      <div class="news_tabs">
        <button
          class="news_tab"
          :class="{ active: currentTab === 'all' }"
          @click="changeTab('all')"
        >
          全部消息
        </button>
        <button
          class="news_tab"
          :class="{ active: currentTab === 'latest' }"
          @click="changeTab('latest')"
        >
          最新消息
        </button>
        <button
          class="news_tab"
          :class="{ active: currentTab === 'activity' }"
          @click="changeTab('activity')"
        >
          活動消息
        </button>
      </div>
      <div class="news_tab_content">
        <!-- 全部消息 -->
        <div>
          <div
            v-for="(message, index) in data"
            :key="message.id"
            class="message"
          >
            <div class="news_pic">
              <img :src="message.img" alt="Message Image" />
            </div>
            <div class="news_message_content">
              <p
                class="news_category"
                :style="{
                  backgroundColor:
                    message.category === 'NEWS' ? '#5AC4C4' : '#FF5E1E'
                }"
              >
                {{ message.category }}
              </p>
              <p class="news_date">{{ message.date }}</p>
              <p class="news_title">{{ message.content }}</p>
              <div
                class="news_more"
                :class="index % 2 !== 0 ? 'left_text' : ''"
              >
                <a href="#">view more</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="horizontal_rule">
    <img
      src="../assets/images/news/horizontal_rule.svg"
      alt="horizontal_rule"
    />
  </div>
  <section class="news_photo_wall">
    <div class="news_photo_title">活動花絮</div>
    <div class="news_photo_frame">
      <div
        v-for="(photo, index) in photos"
        :key="photo.img"
        class="news_photos"
      >
        <img :src="photo.img" alt="news_Photo" />
        <div
          class="news_text"
          v-html="photos[index].photo_text.replace('_', '<br>')"
        ></div>
      </div>
    </div>
  </section>
</template>

<script>
import PageTitle from "@/components/PageTitle.vue";
export default {
  components: {
    PageTitle
  },
  data() {
    return {
      title: "最新消息",
      currentTab: "all",
      allMessages: [],
      photos: [
        {
          img: require("@/assets/images/news/photo_wall_02.png"),
          photo_text: "2022/08_火熱熱網咖聯賽"
        },
        {
          img: require("@/assets/images/news/photo_wall_05.png"),
          photo_text: "2022/10_全新服務上線,漫畫租借!"
        },
        {
          img: require("@/assets/images/news/photo_wall_06.png"),
          photo_text: "2022/10_全新服務上線,漫畫租借!"
        },
        {
          img: require("@/assets/images/news/photo_wall_03.png"),
          photo_text: "2023/01_新店開張！最新設備、最豪華環境!"
        },
        {
          img: require("@/assets/images/news/photo_wall_04.png"),
          photo_text: "2023/01_白鑽級會員活動"
        },
        {
          img: require("@/assets/images/news/photo_wall_01.png"),
          photo_text: "2023/05_組隊集結，征服召喚峽谷"
        }
      ],
      page: 1,
      data: []
    };
  },
  methods: {
    changeTab(tabName) {
      this.currentTab = tabName;
      /*分類消息類別*/
      if (tabName === "latest") {
        this.data = this.allMessages.filter(
          (message) => message.category === "NEWS"
        );
      } else if (tabName === "activity") {
        this.data = this.allMessages.filter(
          (message) => message.category === "ACTIVITY"
        );
      } else {
        this.data = this.allMessages;
      }
    }
  },
  computed: {
    paginatedAllMessages() {
      const startIndex = (this.page - 1) * 5;
      const endIndex = this.allMessages.length;
      /*const endIndex = startIndex + 5;*/
      return this.allMessages.slice(startIndex, endIndex);
    }
  },
  created() {
    this.data = this.allMessages;
    this.axios
      .get("/data/news.json")
      .then((res) => {
        this.allMessages = this.data = res.data;
      })
      .catch((err) => {
        console.log(err);
      });
  }
}
</script>
