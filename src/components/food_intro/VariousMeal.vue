
<template>
    <section>
        <div class="variousmeal_container">
            <h3>\ 各式餐點 /</h3>
            <div class="category_buttons">
                <button @click="showCategory('all')"
                    :class="{ active: selectedCategory === 'all', allHover: allHover }">全部</button>
                <button @click="showCategory('main_meal')" :class="{ active: selectedCategory === 'main_meal' }">主餐</button>
                <button @click="showCategory('drinks')" :class="{ active: selectedCategory === 'drinks' }">飲料</button>
                <button @click="showCategory('dessert')" :class="{ active: selectedCategory === 'dessert' }">點心</button>
            </div>
            <div class="variousmeal_card_area">
                <div v-for="food in filteredFoods" :key="food.id" class="food_card">
                    <div class="food_cards_meal_pic">
                        <img :src="food.img" :alt="food.description">
                    </div>
                    <p>{{ food.description }}</p>
                </div>
            </div>
        </div>
    </section>
</template>

<style >
@import "@/assets/scss/layout/food_intro/variousmeal.scss";
</style>
<script>
import PageTitle from '@/components/PageTitle.vue';
export default {
    components: {
        PageTitle,
    },
    data() {
        return {
            selectedCategory: 'all',
            allHover: false,
            allFood: [],
            foods: [
                {
                    id: 1,
                    img: require('@/assets/images/food/main_meal/main_meal (1).webp'),
                    category: 'main_meal',
                    description: '嫩煎牛排'
                },
                {
                    id: 2,
                    img: require('@/assets/images/food/main_meal/main_meal (2).webp'),
                    category: 'main_meal',
                    description: '南瓜粥'
                },
                {
                    id: 3,
                    img: require('@/assets/images/food/main_meal/main_meal (3).webp'),
                    category: 'main_meal',
                    description: '綠咖哩'
                },
                {
                    id: 4,
                    img: require('@/assets/images/food/main_meal/main_meal (4).webp'),
                    category: 'main_meal',
                    description: '豬肉炒飯'
                },
                {
                    id: 5,
                    img: require('@/assets/images/food/main_meal/main_meal (5).webp'),
                    category: 'main_meal',
                    description: '炒泡麵'
                },
                {
                    id: 6,
                    img: require('@/assets/images/food/main_meal/main_meal (6).webp'),
                    category: 'main_meal',
                    description: '鱈魚排'
                },
                {
                    id: 7,
                    img: require('@/assets/images/food/main_meal/main_meal (7).webp'),
                    category: 'main_meal',
                    description: '乳酪派＋珍珠鮮奶茶'
                },
                {
                    id: 8,
                    img: require('@/assets/images/food/main_meal/main_meal (8).webp'),
                    category: 'main_meal',
                    description: '牛肉漢堡＋薯條'
                },
                {
                    id: 9,
                    img: require('@/assets/images/food/main_meal/main_meal (9).webp'),
                    category: 'main_meal',
                    description: '義氏火腿起司帕尼尼'
                },
                {
                    id: 10,
                    img: require('@/assets/images/food/main_meal/main_meal (10).webp'),
                    category: 'main_meal',
                    description: '炸醬麵＋檸檬可樂'
                },
                {
                    id: 11,
                    img: require('@/assets/images/food/main_meal/main_meal (11).webp'),
                    category: 'main_meal',
                    description: '泡菜拉麵＋檸檬可樂'
                },

                {
                    id: 1,
                    img: require('@/assets/images/food/drinks/drinks (1).webp'),
                    category: 'drinks',
                    description: '咖啡'
                },
                {
                    id: 2,
                    img: require('@/assets/images/food/drinks/drinks (2).webp'),
                    category: 'drinks',
                    description: '珍珠鮮奶茶'
                },
                {
                    id: 3,
                    img: require('@/assets/images/food/drinks/drinks (3).webp'),
                    category: 'drinks',
                    description: '檸檬可樂'
                },

                {
                    id: 1,
                    img: require('@/assets/images/food/dessert/dessert (1).webp'),
                    category: 'dessert',
                    description: '炸雞塊'
                },
                {
                    id: 2,
                    img: require('@/assets/images/food/dessert/dessert (2).webp'),
                    category: 'dessert',
                    description: '紐澳良雞翅'
                },
                {
                    id: 3,
                    img: require('@/assets/images/food/dessert/dessert (3).webp'),
                    category: 'dessert',
                    description: '草莓巧克力乳酪蛋糕'
                },
                {
                    id: 4,
                    img: require('@/assets/images/food/dessert/dessert (4).webp'),
                    category: 'dessert',
                    description: '香菇肉醬義式披薩'
                },
                {
                    id: 5,
                    img: require('@/assets/images/food/dessert/dessert (5).webp'),
                    category: 'dessert',
                    description: '薯條'
                },
                {
                    id: 6,
                    img: require('@/assets/images/food/dessert/dessert (6).webp'),
                    category: 'dessert',
                    description: '義式薄餅'
                },
                {
                    id: 7,
                    img: require('@/assets/images/food/dessert/dessert (7).webp'),
                    category: 'dessert',
                    description: '上海鮮肉一口餃'
                },
                {
                    id: 8,
                    img: require('@/assets/images/food/dessert/dessert (8).webp'),
                    category: 'dessert',
                    description: '蔬菜沙拉'
                },
            ],
            selectedCategory: 'all'
        };
    },
    computed: {
        filteredFoods() {
            return this.foods.filter((food) =>
                this.selectedCategory === 'all'
                    ? true // If "all" category selected, return all foods
                    : food.category === this.selectedCategory
            );
        },
    },
    methods: {
        showCategory(category) {
            this.selectedCategory = category;
        },
    },
    mounted() {
        this.allHover = true;
    },
};


</script>