<template>
    <div class="comic_detail">
        <div class="card" v-for="item in card">
                <div class="pic">
                    <img src="https://picsum.photos/400/600/?random=10">
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
                        text_title_h2: '皺術回戰',
                        text_title_p: 'Wayne',
                        text_introduce_text: 'asfdsfdsfdsfdslfkjdslfkjdslkdjgldkfjglkfdjgkfdjgfdk',
                        translate: 'Wayne',
                        press: '緯育',
                        date: '2022/2/2',
                        language: '中文'
                    }],
        }
    },
    methods: {

    },
}
</script>