<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <section class="game">
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
      <img src="/game/puzzle01.png" alt="" id="1">
      <img src="/game/puzzle02.png" alt="" id="2">
      <img src="/game/puzzle03.png" alt="" id="3">
      <img src="/game/puzzle04.png" alt="" id="4">
      <img src="/game/puzzle05.png" alt="" id="5">
      <img src="/game/puzzle06.png" alt="" id="6">
      <img src="/game/puzzle07.png" alt="" id="7">
      <img src="/game/puzzle08.png" alt="" id="8">
      <img src="/game/puzzle09.png" alt="" id="9">
    </div>
  
    <button class="btn">check answer</button>
    <button class="reset"> reset</button>
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

    // 檢查答案，將位置的自訂ID和圖片的ID進行比對
    function check() {
      const dropZoneImgs = document.querySelectorAll('.drop-zone img');
      if(dropZoneImgs.length === 0 || dropZoneImgs.length !== 9) {
        alert('尚未完成拼圖');
        return;
      }
      const imgArray = Array.from(dropZoneImgs);
      const dropZoneArray = Array.from(dropZone); // 將 NodeList 轉換為陣列

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
      alert('correct');
    }

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
          img.src = `/game/puzzle0${randNum}.png`;
          img.id = `${randNum}`;
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

    checkBtn.onclick = check;

    function rand() {
      return Math.floor(Math.random() * 9) + 1;
    }
  },
}
</script>