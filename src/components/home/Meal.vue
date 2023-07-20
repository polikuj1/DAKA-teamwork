<template>
    <section class="home_meal">
        <h3>美味餐點</h3>
        <div class="meal_intro">
            <img src="@/assets/images/home/text_bg.svg" alt="text_bg">

            <div class="meal_intro_content">
                <p>
                    無需離開遊戲環境，您只需輕輕一按，美味餐點就能送到您的桌前。您可以在享受遊戲的同時，隨心品味各式佳餚，為遊戲體驗增添一份風味與滿足。
                </p>
                <a href="">more <img src="@/assets/images/index/arrow_orange.png" alt="arrow"></a>
            </div>
        </div>

        <div class="meal_figure">
            <img src="@/assets/images/home/food_sharing.svg" alt="共享美食">
        </div>

        <!-- <div class="meal_pic meal01">
            <img src="img/onigiri.png" alt="onigiri">
        </div>
        <div class="meal_pic meal02">
            <img src="img/ramen.png" alt="ramen">
        </div>
        <div class="meal_pic meal03">
            <img src="img/fried_chicken.png" alt="fried_chicken">
        </div>
        <div class="meal_pic meal04">
            <img src="img/takoyaki.png" alt="takoyaki">
        </div> -->

        <div v-for="meal in meals" :key="meal.id" :class="`meal_pic ${meal.id}`">
            <img :src="meal.imgSrc" :alt="meal.alt">
        </div>
    </section>
</template>

<script>
export default {
    name: '',
    data() {
        return {
            meals: [
                {
                    id: 'meal01',
                    imgSrc: require('@/assets/images/home/onigiri.png'),
                    alt: 'onigiri'
                },
                {
                    id: 'meal02',
                    imgSrc: require('@/assets/images/home/ramen.png'),
                    alt: 'ramen'
                },
                {
                    id: 'meal03',
                    imgSrc: require('@/assets/images/home/fried_chicken.png'),
                    alt: 'fried_chicken'
                },
                {
                    id: 'meal04',
                    imgSrc: require('@/assets/images/home/takoyaki.png'),
                    alt: 'takoyaki'
                },
            ]
        }
    },
    methods: {

    },
    computed: {

    },
    component: {

    },
    mounted() {

    },
}
</script>