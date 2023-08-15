<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <section class="slot_machine">
    <div class="machine">
      <!-- <div class="slot_btn" @click="spin">
        <div><img src="@/assets/images/game/handle_01.svg" alt=""></div>
        <div><img src="@/assets/images/game/handle_02.svg" alt=""></div>
        <div><img src="@/assets/images/game/handle_03.svg" alt=""></div>
      </div> -->
      <div :class="['handler', { 'active': active }, { 'disabled': disabled }]">
        <div class="stick2"></div>
        <div class="stick"></div>
        <div class="ball" @click="!disabled && turn()"></div>
      </div>
      <div class="monitor">
        <div class="fruits">
          <div class="pic one">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg" data-index="last">
          </div>
        </div>
        <div class="fruits">
          <div class="pic two">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg" data-index="last">
          </div>
        </div>
        <div class="fruits">
          <div class="pic three">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg">
            <img src="@/assets/images/game/fruit05.svg">
            <img src="@/assets/images/game/fruit01.svg">
            <img src="@/assets/images/game/fruit02.svg">
            <img src="@/assets/images/game/fruit03.svg">
            <img src="@/assets/images/game/fruit04.svg" data-index="last">
          </div>
        </div>
      </div>
    </div>
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
      title: '會員專屬遊戲',
      active: false,
      disabled: false,
    }
  },
  methods: {
    spin() {
      function rand(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
      }
      const btn = document.querySelector('.h1');
      const fruit_pic = document.querySelectorAll('.fruits .pic');
      const pic_one = document.querySelectorAll('.pic.one img');
      const pic_two = document.querySelectorAll('.pic.two img');
      const pic_three = document.querySelectorAll('.pic.three img');
      let controlValue = 0;
      let fruitArr= [];
      fruit_pic.forEach(item => {
        item.classList.add('spin');
        setTimeout(() => {
          item.classList.remove('spin');
        },3100);
      })
      setTimeout(() => {
        console.log('變換圖片');
        pic_one.forEach(item => {
          item.src= `/chd102/g6/img/fruit0${rand(1,5)}.svg`;
          if(item.dataset.index === 'last') {
            fruitArr.push(item.src.slice(-5,-4));
          }
        });
        pic_two.forEach(item => {
          item.src= `/chd102/g6/img/fruit0${rand(1,5)}.svg`;
          if(item.dataset.index === 'last') {
            fruitArr.push(item.src.slice(-5,-4));
          }
        });
        pic_three.forEach(item => {
          item.src= `/chd102/g6/img/fruit0${rand(1,5)}.svg`;
          if(item.dataset.index === 'last') {
            fruitArr.push(item.src.slice(-5,-4));
          }
        });
      },1500);
      setTimeout(() => {
        pic_one[0].src = `/chd102/g6/img/fruit0${fruitArr[0]}.svg`;
        pic_two[0].src = `/chd102/g6/img/fruit0${fruitArr[1]}.svg`;
        pic_three[0].src = `/chd102/g6/img/fruit0${fruitArr[2]}.svg`;
      }, 2700)
      setTimeout(() => {
        if(fruitArr[0] === fruitArr[1] && fruitArr[0] === fruitArr[2]) {
          let str = '';
          switch (fruitArr[0]) {
            case '1':
              str = '蘋果';
              break;
            case '2':
              str = '櫻桃';
              break;
            case '3':
              str = '水蜜桃';
              break;
            case '4':
              str = '芭樂';
              break;
            case '5':
              str = '橘子';
              break;
          }
          alert(`恭喜中${str}`);
        }
        this.disabled = false;
      },3500)
      
    },
    turn () {
      this.active = true;
      setTimeout(() => {
        this.active = false;
      }, 500)
      this.disabled = true;
      this.spin();
    },
  },
  created() {

  }
}
</script>

