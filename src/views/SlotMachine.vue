<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <section class="slot_machine">
    <div class="machine">
      <div class="play_bar press">
        <!-- <img src="slotmachine.svg" alt=""> -->
      </div>
      <div class="monitor">
        <div class="fruits">
          <div class="pic one">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
          </div>
        </div>
        <div class="fruits">
          <div class="pic two">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
          </div>
        </div>
        <div class="fruits">
          <div class="pic three">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
            <img src="/game/1.svg">
            <img src="/game/2.svg">
            <img src="/game/3.svg">
          </div>
        </div>
      </div>
    </div>
    <button class="btn" @click="spin">spin</button>
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
      title: '會員專屬遊戲'
    }
  },
  methods: {
    spin() {
      function rand(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
      }
      const btn = document.querySelector('.btn');
      const fruit_pic = document.querySelectorAll('.fruits .pic');
      const pic_one = document.querySelectorAll('.pic.one img');
      const pic_two = document.querySelectorAll('.pic.two img');
      const pic_three = document.querySelectorAll('.pic.three img');
      let controlValue = 0;
      btn.disabled = true;
      fruit_pic.forEach(item => {
        // item.classList.remove('spin');
        console.log(item);
        // if(controlValue === 1) {
        //   moveDOM();
        //   item.classList.remove('spin');
        //   return;
        // }
        item.classList.add('spin');
        setTimeout(() => {
          console.log('變換圖片');
          pic_one.forEach(item => {
            item.src= `/game/${rand(1,3)}.svg`;
          });
          pic_two.forEach(item => {
            item.src= `/game/${rand(1,3)}.svg`;
          });
          pic_three.forEach(item => {
            item.src= `/game/${rand(1,3)}.svg`;
          });
        },1500);
        setTimeout(() => {
          btn.disabled = false;
          item.classList.remove('spin');
        },3100);
      })
      controlValue = 1;
    },
  },
  created() {

  }
}
</script>


<style scoped lang="scss">
* {
  margin: 0;
  padding: 0;
  list-style: none;
}
html, body {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.machine {
  width: 400px;
  height: 600px;
  margin: auto;
  background: #f0a;
  display: flex;
  align-items: center;
  position: relative;
}
.machine .play_bar {
  position: absolute;
  right: -46px;
  width: 70px;
  height: 150px;
}
.machine .press {
  transform-style: preserve-3d;
  perspective: 100px;
  /* transform: rotate3d(1, 0, 0, 50deg); */
  animation: down 1s linear 1 forwards;
  /* transform-origin: 0% 100%; */
}
.play_bar img {
  width: 100%;
  height: 100%;
}
.monitor {
  width: 100%;
  height: 180px;
  padding: 25px;
  display: flex;
  justify-content: space-evenly;
  background-color: #aaa;
}
.fruits {
  width: 80px;
  height: 100%;
  border: 1px solid red;
  // overflow: hidden;
  text-align: center;
  position: relative;
}
.fruits .pic {
  width: 60px;
  height: 50px;
  position: relative;
}
.spin {
  animation: scroll 3s cubic-bezier(.5,0,.5,1) forwards, blur 3s cubic-bezier(.5,0,.5,1) 1;
}
.fruits .pic img {
  width: 100%;
  height: 100%;
  padding-bottom: 10px;
  display: block;
}
.fruits .one {
  animation-delay: 0.2s;
}
.fruits .two {
  animation-delay: 0.5s;
}
.fruits .three {
  animation-delay: 0.8s;
}

@keyframes scroll {
  0% {transform: translate3d(0,0,0);}
  90% {transform: translate3d(0,-1800px,0);}
  100% {transform: translate3d(0,-1760px,0);}
}
@keyframes blur {
  0% {filter: blur(0);}
  10% {filter: blur(0);}
  30% {filter: blur(6px);}
  60% {filter: blur(6px);}
  95% {filter: blur(2px);}
  100% {filter: blur(0px);}
}

@keyframes down {
  0% {
    transform: rotate3d(1, 0, 0, 0deg);
  }
  50% {
    transform: rotate3d(1, 0, 0, 180deg);
  }
  100% {
    transform: rotate3d(1, 0, 0, 0deg);
  }
}
</style>