<template>
    <div class="comic_detail">
        <div class="card" v-for="item in card">
                <div class="pic">
                    <img :src="item.src">
                </div>
                <div class="text">
                    <div class="text_title">
                        <h2>{{item.text_title_h2}}</h2>
                        <p>作者：{{item.text_title_p}}</p>
                    </div>
                    <div class="text_reserve">
                        <a href="#">預約此書</a>
                    </div>
                    <div class="text_introduce">
                        <div class="text_introduce_title">
                            漫畫簡介：
                        </div>
                        <div class="text_introduce_text">
                            {{item.text_introduce_text}}
                        </div>
                    </div>
                    <div class="text_infor">
                        <P>譯者：{{ item.translate}}</P>
                        <P>出版社：{{ item.press}}</P>
                        <P>出版日期：{{ item.date}}</P>
                        <P>語言：{{ item.language}}</P>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            card: [{
                        text_title_h2: '咒術回戰',
                        text_title_p: '芥見下下',
                        text_introduce_text: '澀谷車站地下月台塞滿了一般人與改造人——在眾人無處可逃的慘況下，五條的力量還是凌駕於咒靈之上。然而，敵人卻使出了絕招要封印五條……！虎杖急忙趕往地下月台時，卻有意料之外的伙伴來到了他身邊！',
                        translate: '張紹仁',
                        press: '東立',
                        date: '2023/01/06',
                        language: '繁體中文',
                        src:require("@/assets/images/comic/jyujyutsu01.webp"),
            }],
        }
    },
    methods: {

    },
}
</script>