<template>
    <PageTitle>{{ title }}</PageTitle>
    <div class="news_detail_title">
        <div class="title">
            <div class="title_infor">
                <div class="title_category">{{ news.news_category }}</div>
                <div class="title_date">{{ news.news_date }}</div>
            </div>
            <div class="title_text">{{ news.news_title }}</div>
        </div>
        <div class="news_detail_card">
            <div class="card">
                <!-- <img src="../assets/images/news/lol.png" alt="英雄聯盟"> -->
                <Images :imgURL="`${news.news_pic}`" :alt="`${news.news_title}`" />
                <div class="text" v-html="news.news_text"></div>
                <div class="options">
                    <a @click="goNews" class="a">＜上一篇</a>
                    <router-link to="/news" class="a">返回列表</router-link>
                    <a @click="goNews" class="a">下一篇＞</a>
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
            title:'消息詳情',
            news: [],
            res: [],
        }
    },
    methods: {
        goNews(e) {
            console.log(e.target.textContent);
            if(e.target.textContent === '下一篇＞') {
                if(this.news.id === this.res.length) {
                    this.$router.push(`/news_detail/1`);
                } else {
                    this.$router.push(`/news_detail/${this.news.id + 1}`);
                }
            } else {
                if(this.news.id === 1) {
                    this.$router.push(`/news_detail/${this.res.length}`);
                } else {
                    this.$router.push(`/news_detail/${this.news.id - 1}`);
                }
            }
            this.getData();
        },
        getData() {
            GET('/data/news.json')
            .then((res) => {
                this.res = res;
                let data = res.filter(item => item.id === parseInt(this.$route.params.id));
                console.log(data);
                this.news = data[0];
            })
            .catch((err) => {
                console.log(err);
            })
        }
    },
    components: {
        PageTitle,
    },
    created() {
        this.getData();
    }
}
</script >