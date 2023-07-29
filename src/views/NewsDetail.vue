<template>
    <PageTitle>{{ page_title }}</PageTitle>
    <div class="news_detail_title">
        <div class="title">
            <div class="title_infor">
                <div class="title_category">{{ title.news_category }}</div>
                <div class="title_date">{{ title.news_date }}</div>
            </div>
            <div class="title_text">{{ title.news_title }}</div>
        </div>
        <div class="news_detail_card">
            <div class="card">
                <!-- <img src="../assets/images/news/lol.png" alt="英雄聯盟"> -->
                <Images :imgURL="`${title.news_pic}`" :alt="`${title.content}`" />

                <div class="text" v-html="title.news_text"></div>
                <!-- <div class="text_bottom">
                    {{ title.text_bottom }}
                </div> -->

                <div class="options">
                    <a href="#" class="a">＜上一篇</a>
                    <a href="#" class="a">返回列表</a>
                    <a href="#" class="a">下一篇＞</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {GET} from '@/plugin/axios';
import PageTitle from '@/components/PageTitle.vue';
export default {
    name: '',
    data() {
        return {
            page_title:'消息詳情',
            title: [],
        }
    },
    methods: {

    },
    computed: {
        

    },
    components: {
        PageTitle,
    },
    mounted() {

    },
    created() {
    GET('/data/news.json')
    .then((res) => {
    //   console.log(res);
    //   this.title = res;
    const indexToShow = 0;
        if (res && res.length > indexToShow) {
          this.title = res[indexToShow];
        }
    })
    .catch((err) => {
      console.log(err);
    })
    }
}
</script >