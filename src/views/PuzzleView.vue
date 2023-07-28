<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <section class="game">
    <div class="wrap">
      <div class="drop-zone">
        <div dataset-id="1"></div>
        <div dataset-id="2"></div>
        <div dataset-id="3"></div>
        <div dataset-id="4"></div>
        <div dataset-id="5"></div>
        <div dataset-id="6"></div>
        <div dataset-id="7"></div>
        <div dataset-id="8"></div>
        <div dataset-id="9"></div>
      </div>
      <div class="puzzle">
        <img src="@/assets/images/game/puzzle01.png" alt="" id="3">
        <img src="@/assets/images/game/puzzle02.png" alt="" id="9">
        <img src="@/assets/images/game/puzzle03.png" alt="" id="7">
        <img src="@/assets/images/game/puzzle04.png" alt="" id="8">
        <img src="@/assets/images/game/puzzle05.png" alt="" id="4">
        <img src="@/assets/images/game/puzzle06.png" alt="" id="5">
        <img src="@/assets/images/game/puzzle07.png" alt="" id="1">
        <img src="@/assets/images/game/puzzle08.png" alt="" id="6">
        <img src="@/assets/images/game/puzzle09.png" alt="" id="2">
      </div>
    </div>
    <button class="btn" @click="check">送出答案</button>
    <button class="reset">重置拼圖</button>
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
    goAward() {
      this.$router.push('/award');
    },
    // 檢查答案，將位置的自訂ID和圖片的ID進行比對
    check() {
      const dropZone = document.querySelectorAll('.drop-zone div');
      let dropImg = [];
      const imgs = document.querySelectorAll('.puzzle img');
      const dropZoneImgs = document.querySelectorAll('.drop-zone img');
      console.log(dropZoneImgs);
      if(dropZoneImgs.length === 0 || dropZoneImgs.length !== 9) {
        alert('尚未完成拼圖');
        return;
      }
      const imgArray = Array.from(dropZoneImgs);
      const dropZoneArray = Array.from(dropZone); // 將 NodeList 轉換為陣列
      console.log(imgArray);
      console.log(dropZoneArray);
      for (let index = 0; index < dropZoneArray.length; index++) {
        const imgId = imgArray[index].id;
        console.log('img',imgId);
        const divId = dropZoneArray[index].getAttribute('dataset-id');
        console.log('div',divId);
        if(imgId !== divId) {
          alert('error');
          return;
        }
      }
      alert('恭喜答對，獲得拉霸機獎勵一次');
      this.goAward();
    }
  },
  mounted() {
    const dropZone = document.querySelectorAll('.drop-zone div');
    let dropImg = [];
    const imgs = document.querySelectorAll('.puzzle img');
    const checkBtn = document.querySelector('.btn');
    const resetBtn = document.querySelector('.reset');

    // 監聽拼圖區的圖片拖曳事件
    imgs.forEach((item) => {
      item.addEventListener('dragstart', (e) => {
        // console.log(item)
        e.dataTransfer.clearData();
        const imgId = e.target.id;
        // console.log(imgId)
        e.dataTransfer.setData('text', imgId);
      })
    })
    dropZone.forEach((item) => {
      item.addEventListener('dragover', (e) => {
        e.preventDefault();
      })
      item.addEventListener('drop', (e) => {
        e.preventDefault();
        const id = e.dataTransfer.getData('text')
        const node = document.getElementById(id);
        if(e.target.nodeName === 'DIV') {
          e.target.appendChild(node);
        }
      })
    })

    // 拼圖區全部重置，並且要重新抓取拼圖的元素、和監聽拖曳事件
    let numArr = [];
    resetBtn.addEventListener('click', () => {
      numArr = [];
      dropZone.forEach(item => {
        item.innerHTML = null;
      })
      const puzzle = document.querySelector('.puzzle');
      if(puzzle.children.length === 9) return;
      puzzle.innerHTML = null;
      while (numArr.length < 9) {
        let img = document.createElement('img');
        const randNum = rand();
        console.log(randNum);
        console.log(typeof numArr.indexOf(randNum));
        if(numArr.indexOf(randNum) == -1) {
          numArr.push(randNum);
          // img.src = `https://picsum.photos/id/${randNum}/200/300`;
          img.src = `/chd102/g6/img/puzzle0${randNum}.png`;
          switch (randNum) {
            case 1:
              img.id = `3`;
              break;
            case 2:
              img.id = `9`;
              break;
            case 3:
              img.id = `7`;
              break;
            case 4:
              img.id = `8`;
              break;
            case 5:
              img.id = `4`;
              break;
            case 6:
              img.id = `5`;
              break;
            case 7:
              img.id = `1`;
              break;
            case 8:
              img.id = `6`;
              break;
            case 9:
              img.id = `2`;
              break;
          }
          // img.id = `${randNum}`;
          puzzle.appendChild(img);
        }

      }
      const imgs = document.querySelectorAll('.puzzle img');
      // console.log(imgs);
      imgs.forEach((item) => {
        item.addEventListener('dragstart', (e) => {
          e.dataTransfer.clearData();
          const imgId = e.target.id;
          e.dataTransfer.setData('text', imgId);
        })
      })
    })

    function rand() {
      return Math.floor(Math.random() * 9) + 1;
    }
  },
}
</script>