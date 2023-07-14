<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <div>
    reservation
  </div>
</template>

<script>
import PageTitle from '@/components/PageTitle.vue';
export default {
  components: {
    PageTitle
  },
  data() {
    return {
      title: '訂位預約',
    }
  },
  methods: {

  },
  computed: {

  },
}

</script>