
<template>
    <section>
        <div class="aboutorigin_container">
            <h3>各式餐點</h3>
            <div id="app">
                <div class="category-buttons">
                    <button @click="showCategory('combo')">套餐</button>
                    <button @click="showCategory('main_meal')">主餐</button>
                    <button @click="showCategory('drinks')">飲料</button>
                    <button @click="showCategory('dessert')">點心</button>
                </div>
                <div class="food-cards">
                    <div v-for="food in filteredFoods" :key="food.id" class="food-card">
                        <div class="food-cards_meal_pic">
                            <img :src="food.img" :alt="food.description">
                        </div>
                        <p>{{ food.description }}</p>
                    </div>
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
            foods: [
                { id: 1, img: require('@/assets/images/food/combo/combo (1).png'), category: 'combo', description: 'This is Combo 1' },
                { id: 1, img: require('@/assets/images/food/combo/combo (2).png'), category: 'combo', description: 'This is Combo 1' },
                { id: 1, img: require('@/assets/images/food/combo/combo (3).png'), category: 'combo', description: 'This is Combo 1' },
                { id: 1, img: require('@/assets/images/food/combo/combo (4).png'), category: 'combo', description: 'This is Combo 1' },
                { id: 1, img: require('@/assets/images/food/combo/combo (5).png'), category: 'combo', description: 'This is Combo 1' },
                // 添加更多的食物...

                { id: 1, img: require('@/assets/images/food/main_meal/main_meal (1).png'), category: 'main_meal', description: 'This is Main Meal 1' },
                { id: 1, img: require('@/assets/images/food/main_meal/main_meal (2).png'), category: 'main_meal', description: 'This is Main Meal 1' },
                { id: 1, img: require('@/assets/images/food/main_meal/main_meal (3).png'), category: 'main_meal', description: 'This is Main Meal 1' },
                { id: 1, img: require('@/assets/images/food/main_meal/main_meal (4).png'), category: 'main_meal', description: 'This is Main Meal 1' },
                { id: 1, img: require('@/assets/images/food/main_meal/main_meal (5).png'), category: 'main_meal', description: 'This is Main Meal 1' },
                { id: 1, img: require('@/assets/images/food/main_meal/main_meal (6).png'), category: 'main_meal', description: 'This is Main Meal 1' },
                // 添加更多的食物...

                { id: 1, img: require('@/assets/images/food/drinks/drinks (1).png'), category: 'drinks', description: 'This is Main Meal 1' },
                { id: 1, img: require('@/assets/images/food/drinks/drinks (2).png'), category: 'drinks', description: 'This is Main Meal 2' },
                { id: 1, img: require('@/assets/images/food/drinks/drinks (3).png'), category: 'drinks', description: 'This is Main Meal 3' },
                // 添加更多的食物...

                { id: 1, img: require('@/assets/images/food/dessert/dessert (1).png'), category: 'dessert', description: 'This is Main Meal 1' },
                { id: 1, img: require('@/assets/images/food/dessert/dessert (2).png'), category: 'dessert', description: 'This is Main Meal 1' },
                { id: 1, img: require('@/assets/images/food/dessert/dessert (3).png'), category: 'dessert', description: 'This is Main Meal 1' },
                { id: 1, img: require('@/assets/images/food/dessert/dessert (4).png'), category: 'dessert', description: 'This is Main Meal 1' },
                { id: 1, img: require('@/assets/images/food/dessert/dessert (5).png'), category: 'dessert', description: 'This is Main Meal 1' },
                { id: 1, img: require('@/assets/images/food/dessert/dessert (6).png'), category: 'dessert', description: 'This is Main Meal 1' },
                { id: 1, img: require('@/assets/images/food/dessert/dessert (7).png'), category: 'dessert', description: 'This is Main Meal 1' },
                { id: 1, img: require('@/assets/images/food/dessert/dessert (8).png'), category: 'dessert', description: 'This is Main Meal 1' },
                // 添加更多的食物...
            ],
            selectedCategory: 'combo'
        };
    },
    computed: {
        filteredFoods() {
            return this.foods.filter(food => food.category === this.selectedCategory);
        }
    },
    methods: {
        showCategory(category) {
            this.selectedCategory = category;
        }
    }
};


</script>