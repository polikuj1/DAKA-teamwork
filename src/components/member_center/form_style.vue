<template>
  <div class="member_form">
   <div class="title">
    <slot name="mb_form_title">預設標題</slot>
    <button type="button">
      <i class="fa-solid fa-circle-chevron-left"></i>
    </button>
   </div>
   <slot name="mb_content">預設內容</slot>
  </div>
</template>