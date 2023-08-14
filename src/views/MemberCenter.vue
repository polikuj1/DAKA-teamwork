<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <BreadCrumb @emit-title="getContent">
    <template v-slot:third_nav>
      <span v-show="content"> / {{ content }}</span>
    </template>
  </BreadCrumb>
  <div class="member_center">
    <div class="user_profile">
      <form class="pic" id="pic">
        <input type="hidden" name="mem_no" v-model="this.$store.state.member.mem_no">
        <input type="hidden" name="mem_id" v-model="this.$store.state.member.mem_id">
        <Images v-if="member.pic" :imgURL="`/memberPic/${member.pic}`" :alt="會員照片"/>
        <!-- <img v-if="member.pic" :src="`/images/memberPic/${member.pic}`" alt="會員照片"> -->
        <Images v-else :imgURL="member_img" :alt="會員上傳預覽照片"/>
        <!-- <img v-else :src="member_img" alt="會員上傳預覽照片"> -->
        <label for="user"><i class="fa-solid fa-square-pen"></i></label>
        <input type="file" id="user" @change="getImage" name="image">
      </form>
      <span><i class="fa-solid fa-crown"></i> 白金會員</span>
      <ul>
        <li>
          <span><i class="fa-solid fa-user"></i></span>
          <span>{{ member.mname}}</span>
        </li>
        <li>
          <span><i class="fa-solid fa-envelope"></i></span>
          <span>{{ member.email }}</span>
        </li>
        <li>
          <!-- <span>編號</span> -->
          <span>
            <img src="@/assets/images/member/qrcode.svg" alt="qrcode">
            <span class="random_num">1234567890ABC</span>
          </span>
        </li>
        <li>
          <span><i class="fa-solid fa-piggy-bank"></i> 儲值金金額</span>
          <span>NTD$ {{ member.remain }}</span>
        </li>
        <li>
          目前消費金額 NTD$ {{ member.value }}
        </li>
      </ul>
      <button type="button">線上儲值</button>
    </div>
    <router-view @emit-title="getContent"></router-view>
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
      member:{},
      member_img: require('@/assets/images/member/user_pic.png'),
      content: '',
      id: null,
    }
  },
  methods: {
    getImage(e) {
      // 預覽圖片
      const file = e.target.files.item(0);
      if(file.type !== 'image/jpeg' && file.type !== 'image/png' && file.type !== 'image/jpg') {alert('只能上傳圖檔');return;};
      const reader = new FileReader();
      reader.addEventListener('load', this.imageLoaded);
      reader.readAsDataURL(file);
      this.uploadImg();
    },
    imageLoaded(e) {
      this.member_img = e.target.result;
    },
    uploadImg() {
      console.log('觸發上傳');
      const formData = new FormData(document.getElementById('pic'));
      this.axios.post(`${this.$URL}/uploadMemberImg.php`, formData)
        .then(res => {
          console.log(res);
        })
        .catch(err => {
          console.log(err);
        })
    },
    getContent(title) {
      this.content = title;
    },
    getData() {
      const params = { id:this.id };
      this.axios.get(`${this.$URL}/getMember.php`,{params: params})
        .then(res => {
          // console.log(res);
          this.member = res.data[0];
          console.log(this.member);
        })
        .catch(err => {
          console.log(err);
        })
    }
  },
  created() {
    this.id = this.$store.state.member.mem_id;
    this.getData();
  }
}
</script>