<template>
  <div class="member_bread_crumb">
    <div>
      <router-link to="/">首頁 /</router-link>
      <router-link to="/member_center/member_nav"> 會員中心</router-link>
      <slot name="third_nav"></slot>
    </div>
    <button type="button">登出</button>
  </div>
</template>