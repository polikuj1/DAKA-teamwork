<template>
  <div class="marquee_list">
      <div class="one">
        <span>#屬於你的遊戲天堂</span>
        <span>#快樂就是這麼簡單</span>
        <span>#屬於你的遊戲天堂</span>
        <span>#快樂就是這麼簡單</span>
        <span>#屬於你的遊戲天堂</span>
        <span>#快樂就是這麼簡單</span>
      </div>
      <div class="one two">
        <span>#屬於你的遊戲天堂</span>
        <span>#快樂就是這麼簡單</span>
        <span>#屬於你的遊戲天堂</span>
        <span>#快樂就是這麼簡單</span>
        <span>#屬於你的遊戲天堂</span>
        <span>#快樂就是這麼簡單</span>
      </div>
    </div>
</template>

<style lang="scss" scoped>
.marquee_list {
  width: 100%;
  display: flex;
  gap: 80px;
  overflow: hidden;
  .one {
    display: flex;
    flex-shrink: 0;
    gap: 80px;
    animation: mar 40s linear infinite;
    span {
      flex-shrink: 0;
      font-size: 80px;
      -webkit-text-fill-color: transparent;
      -webkit-text-stroke: 1px #fff;
    }
  }
  .two {
    animation: mar1 40s linear infinite;
    animation-delay: -20s;
  }
}
@keyframes mar {
  from {
    transform: translateX(105%);
  }
  to {
    transform: translateX(-100%);
  }
}
@keyframes mar1 {
  from {
    transform: translateX(0%);
  }
  to {
    transform: translateX(-200%);
  }
}

</style>