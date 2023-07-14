<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <section class="news">
  </section>
</template>

<script>
import PageTitle from '@/components/PageTitle.vue';
export default {
  components: {
    PageTitle,
  },
  data() {
    return {
      title: '最新消息',
    }
  },
  methods: {

  },
  computed: {

  },
}
</script>