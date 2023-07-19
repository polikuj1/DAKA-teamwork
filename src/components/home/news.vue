<template>
    <section class="news">
        <a class="infor" v-for="item in news" :key="item.text">
            <div class="category">{{ item.category }}</div>
            <div class="date">{{ item.date }}</div>
            <div class="text">{{ item.text }}</div>
            <img class="pic" src="{{item.pic}}" alt="箭頭">
        </a>


    </section>
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
                    pic: ''
                },

                {
                    category: 'ACTICIVY',
                    date: '2023.05.01',
                    text: '五月會員好康禮',
                    pic: ''
                },

                {
                    category: 'ACTICIVY',
                    date: '2023.05.01',
                    text: '五月會員好康禮',
                    pic: ''
                },

                {
                    category: 'NEWS',
                    date: '2023.05.01',
                    text: '五月會員好康禮',
                    pic: ''
                }],
        }
    },
}
</script>