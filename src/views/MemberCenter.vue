<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <BreadCrumb>
    <template v-slot:third_nav>
      <!-- <span> / 信用卡</span> -->
    </template>
  </BreadCrumb>
  <div class="member_center">
    <div class="user_profile">
      <div class="pic">
        <img :src="member_img" alt="會員照片">
        <label for="user"><i class="fa-solid fa-square-pen"></i></label>
        <input type="file" id="user" @change="getImage">
      </div>
      <span><i class="fa-solid fa-crown"></i> 白金會員</span>
      <ul>
        <li>
          <span>姓名</span>
          <span>張嘉哲</span>
        </li>
        <li>
          <span>信箱</span>
          <span>123@yahoo.com.w</span>
        </li>
        <li>
          <span>編號</span>
          <span>
            <img src="@/assets/images/member/qrcode.svg" alt="qrcode">
            <span class="random_num">1234567890ABC</span>
          </span>
        </li>
        <li>
          <span><i class="fa-solid fa-piggy-bank"></i> 儲值金金額</span>
          <span>NTD$ 1,000</span>
        </li>
        <li>
          目前消費金額 NTD$ 5,000
        </li>
      </ul>
      <button type="button">線上儲值</button>
    </div>
    <router-view></router-view>
  </div>
</template>
<script>
import PageTitle from '@/components/PageTitle.vue';
import BreadCrumb from '@/components/member_center/BreadCrumb.vue'
// import MemberNav from '@/components/member_center/MemberNav.vue'
export default {
  components: {
    PageTitle, BreadCrumb,
  },
  data() {
    return {
      title: '會員中心',
      member_img: 'https://picsum.photos/id/182/600/400',
    }
  },
  methods: {
    getImage(e) {
      // console.log(e);
      const file = e.target.files.item(0);
      if(file.type !== 'image/jpeg' && file.type !== 'image/png' && file.type !== 'image/jpg') {alert('只能上傳圖檔');return;};
      // console.log(file);
      const reader = new FileReader();
      reader.addEventListener('load', this.imageLoaded);
      reader.readAsDataURL(file);
    },
    imageLoaded(e) {
      this.member_img = e.target.result;
    },
  },
}
</script>