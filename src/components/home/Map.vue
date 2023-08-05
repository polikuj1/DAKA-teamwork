<template>
    <div>
        <div class="store" v-for="item in store" :key="item.tp_shop">
            <div class="title" data-aos="fade-up"> 分店資訊</div>
            <div class="map">
                <img src="@/assets/images/index/taiwan.svg" alt="台灣" class="taiwan">
                <img :src="item.tp_shop" alt="台北分店" class="tp_shop" data-aos="zoom-in"
                    data-aos-anchor-placement="bottom-bottom">
                <div class="tp_text">台北分館</div>
                <img src="@/assets/images/index/Vector.png" alt="圈圈" class="tp_back" data-aos="zoom-in"
                    data-aos-anchor-placement="bottom-bottom">

                <img :src="item.zl_shop" alt="中壢分店" class="zl_shop" data-aos="zoom-in"
                    data-aos-anchor-placement="bottom-bottom">
                <div class="zl_text">中壢總館</div>
                <img src="@/assets/images/index/Vector.png" alt="圈圈" class="zl_back" data-aos="zoom-in"
                    data-aos-anchor-placement="bottom-bottom">

                <img :src="item.tn_shop" alt="台南分店" class="tn_shop" data-aos="zoom-in"
                    data-aos-anchor-placement="top-bottom">
                <div class="tn_text">台南分館</div>
                <img src="@/assets/images/index/Vector.png" alt="圈圈" class="tn_back" data-aos="zoom-in"
                    data-aos-anchor-placement="top-bottom">

                <img src="@/assets/images/index/taipei.svg" alt="taipei" class="taipei">
                <img src="@/assets/images/index/taoyuan.svg" alt="taoyuan" class="taoyuan">
                <img src="@/assets/images/index/tainan.svg" alt="tainan" class="tainan">

            </div>
            <div class="pic man">
                <img src="@/assets/images/index/walkman.svg" alt="man">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: '',
    data() {
        return {
            store: [{
                tp_shop: require('@/assets/images/index/台北分店.png'),
                zl_shop: require('@/assets/images/index/中壢分店.png'),
                tn_shop: require('@/assets/images/index/台南分店.png'),
            }],
        }
    },
    methods: {

    },
    computed: {

    },
    components: {

    },
    mounted() {

    },
}
</script>