<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <div>
    漫畫展示
  </div>
</template>

<script>
import PageTitle from '@/components/PageTitle.vue';
export default {
  components: {
    PageTitle,
  },
  data() {
    return {
      title: '漫畫推薦',
    }
  },
  methods: {

  },
  computed: {

  },
}
</script>