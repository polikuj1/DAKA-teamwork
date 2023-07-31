<template>
    <PageTitle>
    {{ title }}
  </PageTitle>
    <div class="comic_detail">
        <div class="circle_top">
            <div class="circle_yellow"></div>
        </div>
        <div class="circle_bottom">
            <div class="circle_orange"></div>
        </div>
        <div class="card" v-for="item in comicData" :key="item.title">
            <div class="pic">
                <!-- <img :src="item.img"> -->
                <Images :imgURL="`${item.img}`" :alt="`${item.title}`" />
            </div>
            <div class="text">
                <div class="text_title">
                    <h2>{{ item.title }}</h2>
                    <p>作者：{{ item.author }}</p>
                </div>
                <div class="text_reserve">
                    <a href="#" @click.prevent="addToCart(item)">預約此書<i class="fa-solid fa-book-open-reader bookgap"></i></a>
                </div>
                <div class="text_introduce">
                    <div class="text_introduce_title">
                        漫畫簡介：
                    </div>
                    <div class="text_introduce_text">
                        {{ item.intro }}
                    </div>
                </div>
                <div class="text_infor">
                    <p class="translate">譯者：{{ item.translator }}</p>
                    <p>出版社：{{ item.publisher }}</p>
                    <p>出版日期：{{ item.date }}</p>
                    <p>語言：{{ item.language }}</p>
                </div>
            </div>
        </div>
    </div>
    <CartIcon />
    <ComicSwiper/>
</template>

<script>
import { GET } from '@/plugin/axios';
import CartIcon from '@/components/comic/CartIcon.vue';
import ComicSwiper from '@/components/comic/ComicSwiper.vue'
import PageTitle from '@/components/PageTitle.vue';
export default {
    components: {
        CartIcon,ComicSwiper,PageTitle,
    },
    data() {
        return {
            comicData: [],
            id: 0,
            title:'漫畫租借',

        }
    },
    methods: {
        filter() {
            this.comicData = this.comicData.filter(item => item.id === parseInt(this.id));
        },
        addToCart(item) {
            if (this.$store.state.cart.length === 5) return;
            if (this.$store.state.cart.indexOf(item) === -1) {
                console.log(123);
                this.$store.commit('getBook', item);
            }
        }
    },
    mounted() {
        GET('/data/comic.json')
            .then((res) => {
                console.log(res);
                this.comicData = res;
                this.id = this.$route.params.id;
                this.filter();
            })
            .catch((err) => {
                console.log(err);
            })
    },
}
</script>