<template>
    <section class="home_meal" >
        <h3 data-aos="fade-up">美味餐點</h3>

        <div class="meal_intro" data-aos="fade-up">
            <p>
                無需離開遊戲環境，您只需輕輕一按，美味餐點就能送到您的桌前。您可以在享受遊戲的同時，隨心品味各式佳餚，為遊戲體驗增添一份風味與滿足。
            </p>
            <a @click="this.$router.push('/food')">
                <div class="btn_more">
                    more <img src="@/assets/images/index/arrow_orange.png" alt="arrow">
                </div>
            </a>
        </div>

        <div class="meal_group" >
            <div v-for="meal in meals" :key="meal.id" :class="`meal_pic ${meal.id}`" 
            data-aos="zoom-in-up" data-aos-anchor-placement="bottom-bottom">
                <img :src="meal.imgSrc" :alt="meal.alt">
            </div>
        </div>

        <div class="meal_figure" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
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
                    imgSrc: require('@/assets/images/food/onigiri.png'),
                    alt: 'onigiri'
                },
                {
                    id: 'meal02',
                    imgSrc: require('@/assets/images/food/ramen.png'),
                    alt: 'ramen'
                },
                {
                    id: 'meal03',
                    imgSrc: require('@/assets/images/food/fried_chicken.png'),
                    alt: 'fried_chicken'
                },
                {
                    id: 'meal04',
                    imgSrc: require('@/assets/images/food/takoyaki.png'),
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