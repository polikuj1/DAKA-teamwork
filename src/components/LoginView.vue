<template>
  <div>

    <div class="login">
     
    
    <div class="loginContainer">
      

<div class="loginPic">
  <img :src="require('@/assets/images/footerLogo.png')" alt="">
  <p>
    #快樂就是這麼簡單
  </p>
</div>

<div class="loginForm">
  <label for="" @click="closeModal">X</label>
      <form >
        
        <input class="login_memid" type="text" name="memId" placeholder="信箱" v-model="memId" @input="reset" require>
        <input type="text" name="memPsw" maxlength="12" placeholder="密碼" v-model="memPsw" @input="reset" require>
        <div class="error_message">{{errorMsg}}</div>


        <div class="loginKeep">
          <div class="loginKeepStatus">
            <input type="checkbox">
            <p>保持登入狀態</p>
          </div>
          
          <div class="forgetPsw">忘記密碼?</div>
                  </div>



        <button class="login_form_submit" @click.prevent="checkLogin">登入</button>
        <button @click.prevent="">註冊會員</button>
      <span>OR</span>
      <button v-for="btn in btns">
        
        {{btn.text}}</button>
       
      </form>
    </div>

    </div>

    <div class="register">
     123
    </div>
  </div>
    </div>
</template>
<style>
@import '@/assets/scss/page/login.scss';
</style>
<script>
export default{
  name: 'login',
  data(){
    return{
      memId:'',
      memPsw:'',
      loginStatus:false,
     errorMsg:'',
      btns:[
        {text:'以FACEBOOK帳號登入',
      pic:require('@/assets/images/login/apple.png'),
      },
        {text:'以GOOGLE帳號登入',
        pic:'@/assets/images/login/apple.png'
      },
    {text:'以APPLE帳號登入',
    pic:'@/assets/images/login/apple.png'
  },
      ]

      
      
    }
  },
  
  methods:{
    closeModal(){
      this.$emit('emit-status');
    },
checkLogin(){
if(this.memId==='test'&&this.memPsw==='test'){
  window.alert('登入成功');
  loginStatus:true;
  
}else{
  this.errorMsg='帳號或密碼輸入錯誤';
 
}


},
reset(){
this.memId='';
this.memPsw='';
  this.errorMsg='';
}

  }
}
</script>