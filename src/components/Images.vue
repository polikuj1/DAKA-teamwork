<script setup>
    import { publicPath } from '@/plugin/axios'
    const props = defineProps(['className', 'imgURL', 'alt' ])
</script>

<template>
    {{ publicPath }}
    <img 
        :class="className" 
        :src="`${publicPath}${imgURL}`"
        :alt="alt"
    />
</template>