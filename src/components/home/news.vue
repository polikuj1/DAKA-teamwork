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
        <div class="title" data-aos="fade-up">最新消息</div>
        <section class="news" data-aos="fade-up">
            <a @click="this.$router.push('/news')" class="news_all" v-for="item in news">
                <div class="infor_top">
                    <div :class="['category', item.category === 'ACTIVITY' ? 'active' : '']">{{ item.category }}</div>
                    <div class="date">{{ item.date }}</div>
                </div>

                <div class="infor_bottom">
                    <div class="text">{{ item.text }}</div>
                    <img :src="[item.category === 'ACTIVITY' ? require('@/assets/images/index/arrow_orange.png') : require('@/assets/images/index/arrow_green.png')]" alt="箭頭" class="arrow_green">
                </div>
            </a>
            <a href="/">
                <div class="btn_more">
                    more <img src="@/assets/images/index/arrow_orange.png" alt="arrow">
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
                    date: '2023.07.22',
                    text: '網咖全新升級',
                    pic: require('@/assets/images/index/arrow_green.png'),
                },
                {
                    category: 'ACTIVITY',
                    date: '2023.07.15',
                    text: '超值年度回饋!!',
                    pic: require('@/assets/images/index/arrow_orange.png'),
                },

                {
                    category: 'ACTIVITY',
                    date: '2023.07.10',
                    text: '加入我們的主題派對',
                    pic: require('@/assets/images/index/arrow_orange.png'),
                },

                {
                    category: 'ACTIVITY',
                    date: '2023.07.10',
                    text: '白鑽級會員活動',
                    pic: require('@/assets/images/index/arrow_orange.png'),
                }],
        }
    },
}


</script>




