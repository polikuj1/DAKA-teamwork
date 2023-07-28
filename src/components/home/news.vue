<!-- <template>
    <section class="news">
        <a href="#" class="infor" v-for="item in news" :key="item.text">
            <div class="infor_top">
                <div :class="['category', item.category === 'ACTIVITY' ? 'active' : '']">{{ item.category }}</div>
                <div class="date">{{ item.date }}</div>
            </div>
            <div class="infor_bottom">
                <div class="text">{{ item.text }}</div>
                <img class="pic" :src="item.pic" alt="箭頭">
            </div>
        </a>
    </section>
</template> -->

<template>
    <div class="index_news">
        <div class="title">最新消息</div>
        <section class="news">
            <a @click="this.$router.push('/news')" class="news_all" v-for="item in news">
                <div class="infor_top">
                    <div :class="['category', item.category === 'ACTIVITY' ? 'active' : '']">{{ item.category }}</div>
                    <div class="date">{{ item.date }}</div>
                </div>

                <div class="infor_bottom">
                    <div class="text">{{ item.text }}</div>
                    <img :src="item.pic" alt="箭頭" class="arrow_green">
                </div>
            </a>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            news: [
                {
                    category: 'NEWS',
                    date: '2023.05.01',
                    text: '五月會員好康禮',
                    pic: require('@/assets/images/index/arrow_green.png'),
                },
                {
                    category: 'ACTIVITY',
                    date: '2023.05.01',
                    text: '五月會員好康禮',
                    pic: require('@/assets/images/index/arrow_orange.png'),
                },

                {
                    category: 'ACTIVITY',
                    date: '2023.05.01',
                    text: '五月會員好康禮',
                    pic: require('@/assets/images/index/arrow_orange.png'),
                },

                {
                    category: 'NEWS',
                    date: '2023.05.01',
                    text: '五月會員好康禮',
                    pic: require('@/assets/images/index/arrow_green.png'),
                }],
        }
    },
}
</script>




