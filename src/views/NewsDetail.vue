<template>
    <PageTitle>{{ page_title }}</PageTitle>
    <div class="news_detail_title">
        <div class="title">
            <div class="title_infor">
                <div class="title_category">{{ title.title_category }}</div>
                <div class="title_date">{{ title.title_date }}</div>
            </div>
            <div class="title_text">{{ title.title_text }}</div>
        </div>
        <div class="news_detail_card">
            <div class="card">
                <img src="../assets/images/news/lol.png" alt="英雄聯盟">

                <div class="text" v-html="title.text"></div>
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
import PageTitle from '@/components/PageTitle.vue';
export default {
    name: '',
    data() {
        return {
            page_title:'消息詳情',
            title: {
                title_category: 'NEWS',
                title_date: '2023.05.20',
                title_text: '🔥 組隊集結, 征服召喚峽谷！加入我們的英雄聯盟主題網咖組隊活動, 與好友並肩戰鬥, 譜寫屬於你們的傳奇！',
                pic: '@/assets/images/news/lol.png',
                text: '🎮 召集英雄，組隊征戰！英雄聯盟主題網咖組隊活動，召集你的好友，共創傳奇戰隊！<br><br>🔥💫 親愛的英雄們, 我們隆重舉辦一場特別的英雄聯盟主題網咖組隊活動 ! 招募你最信賴的好友, 組成無敵戰隊, 攜手征戰召喚峽谷 ! 無論你們是追求團隊合作、熱愛競技對戰, 或是追求高水平競賽, 這是一個不容錯過的機會 ! <br><br>🌟 招募戰友在這次活動中, 我們鼓勵你與你的好友一同組隊參與 ! 找到你最強大的戰友, 共同編織出一個傳奇的戰隊 ! 你們將攜手並肩, 共同征戰召喚峽谷, 譜寫屬於自己的傳奇 ! <br><br>🔥 精彩競賽我們將舉辦各種激烈的競賽活動，包括團隊對戰、排位賽等。這是你與你的隊友一展身手、競爭技巧的絕佳機會 ! 準備好與其他戰隊展開激烈的戰鬥，譜寫屬於你們的勝利之歌 ! <br><br>🎁 獎勵豐厚參與我們的英雄聯盟主題網咖組隊活動，你將有機會贏得豐厚的獎勵 ! 我們準備了精美的遊戲周邊和現金獎金，以表彰最強大的戰隊和表現優異的玩家 ! 這是你展現實力、獲得榮耀的最佳時機 !<br><div class="text_bottom">＊1.本優惠活動不得與其他優惠活動合併使用, 如有未盡事宜, 打咖保留、修改、變更或暫停及終止活動之權利, 且不另行通知。2.本活動不得抵現金、退款。3.如對本活動辦法及活動獎項有任何疑問，歡迎與我們聯繫。</div>',
            },
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
}
</script >