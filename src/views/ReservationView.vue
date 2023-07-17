<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <main class="reservation">
    <section class="reservation_read">
      <h2>
        <span>1</span> 閱讀預約需知
      </h2>
      <div class="reservation_read_rules">
        <ul>
          <li><img :src="require('@/assets/images/reservation/Vector.svg')" class="reservation_rules_img">
            為利於其餘客戶權益，每次預約僅保留30分鐘，逾時未到視同放棄，
            如需取消預約，請於1日前取消。</li>
          <li><img :src="require('@/assets/images/reservation/Vector.svg')" class="reservation_rules_img">系統僅提供座位消費金額作為參考，實際消費金額將以當日使用情況為主，最終金額可能因餐點選擇、特殊要求或其他因素而有所變動。</li>
          <li><img :src="require('@/assets/images/reservation/Vector.svg')" class="reservation_rules_img">目前線上付款僅提供扣除儲值金。</li>
          <li><img :src="require('@/assets/images/reservation/Vector.svg')" class="reservation_rules_img">我司將不會以簡訊方式另行通知，如有疑慮，請撥打聯絡電話。</li>
          <li><img :src="require('@/assets/images/reservation/Vector.svg')" class="reservation_rules_img">我司保有最終修改、變更、活動解釋及取消本活動之權利，若有相關異動將會公告於網站， 恕不另行通知。</li>
          <li><img :src="require('@/assets/images/reservation/Vector.svg')" class="reservation_rules_img">座位區預約上限5位，包廂區預約上限2間。</li>
        </ul>


      </div>


    </section>

<section class="reservation_date">
  <h2>
        <span>2</span> 選擇日期及時間
      </h2>
</section>

  </main>








  <div>
  </div>
</template>
<style>
@import '@/assets/scss/page/reservation.scss';
</style>
<script>
import PageTitle from '@/components/PageTitle.vue';


export default {
  components: {
    PageTitle
  },
  data() {
    components: {

    }
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