<template>
    <div id="app">
        <div class="store" v-for="item in store" :key="item.tp_shop">
            <div class="title"> 分店資訊</div>
            <div class="map">
                <img src="@/assets/images/index/taiwan.svg" alt="台灣" class="taiwan">
                <img :src="item.tp_shop" alt="台北分店" class="tp_shop">
                <img :src="item.zl_shop" alt="中壢分店" class="zl_shop">
                <img :src="item.tn_shop" alt="台南分店" class="tn_shop">
                <img src="@/assets/images/index/man.png" alt="man" class="man">
                <div class="tp_text">台北分館</div>
                <div class="zl_text">中壢總館</div>
                <div class="tn_text">台南分館</div>
                <img src="@/assets/images/index/taipei.svg" alt="taipei" class="taipei">
                <img src="@/assets/images/index/taoyuan.svg" alt="taoyuan" class="taoyuan">
                <img src="@/assets/images/index/tainan.svg" alt="tainan" class="tainan">

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