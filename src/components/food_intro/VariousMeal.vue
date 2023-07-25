
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
                        <p>{{ food.name }}</p>
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
                { id: 1, name: 'Combo 1', category: 'combo', description: 'This is Combo 1' },
                { id: 2, name: 'Combo 2', category: 'combo', description: 'This is Combo 2' },
                { id: 2, name: 'Combo 2', category: 'combo', description: 'This is Combo 2' },
                { id: 2, name: 'Combo 2', category: 'combo', description: 'This is Combo 2' },
                { id: 2, name: 'Combo 2', category: 'combo', description: 'This is Combo 2' },
                // 添加更多的食物...

                { id: 30, name: 'Main Meal 1', category: 'main_meal', description: 'This is Main Meal 1' },
                { id: 31, name: 'Main Meal 2', category: 'main_meal', description: 'This is Main Meal 2' },
                { id: 30, name: 'Main Meal 1', category: 'main_meal', description: 'This is Main Meal 1' },
                { id: 31, name: 'Main Meal 2', category: 'main_meal', description: 'This is Main Meal 2' },
                { id: 30, name: 'Main Meal 1', category: 'main_meal', description: 'This is Main Meal 1' },
                { id: 31, name: 'Main Meal 2', category: 'main_meal', description: 'This is Main Meal 2' },
                // 添加更多的食物...

                { id: 22, name: 'Drinks 1', category: 'drinks', description: 'This is Drinks 1' },
                { id: 23, name: 'Drinks 2', category: 'drinks', description: 'This is Drinks 2' },
                { id: 23, name: 'Drinks 2', category: 'drinks', description: 'This is Drinks 2' },
                // 添加更多的食物...

                { id: 13, name: 'Dessert 6', category: 'dessert', description: 'This is Dessert 6' },
                { id: 14, name: 'Dessert 7', category: 'dessert', description: 'This is Dessert 7' },
                { id: 13, name: 'Dessert 6', category: 'dessert', description: 'This is Dessert 6' },
                { id: 14, name: 'Dessert 7', category: 'dessert', description: 'This is Dessert 7' },
                { id: 13, name: 'Dessert 6', category: 'dessert', description: 'This is Dessert 6' },
                { id: 14, name: 'Dessert 7', category: 'dessert', description: 'This is Dessert 7' },
                { id: 13, name: 'Dessert 6', category: 'dessert', description: 'This is Dessert 6' },
                { id: 14, name: 'Dessert 7', category: 'dessert', description: 'This is Dessert 7' },
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