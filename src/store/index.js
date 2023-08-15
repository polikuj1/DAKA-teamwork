import { createStore } from 'vuex'

export default createStore({
  state: {
    login: false,
    member: {},
    cart: [],
    isLoginOpen: false,
    forgotPsw: false,
    isRegister: false,
    keepLoginStatus: false,
    userTokenKey: "user_token",
    googleInfo: {},
    loginModal: false,
  },
  getters: {
  },
  mutations: {
    getBook(state, item) {
      state.cart.push(item);
    },
    deleteBook(state, index) {
      state.cart.splice(index, 1);
    },
    toggleLogin(state,payload) {
      state.isLoginOpen = payload;
    },
    //給member物件
    setInfo(state, payload) {
      state.member = payload;
    },
    setMemberRemain(state, payload) {
      state.member.remain = payload;
    },
    setRegisterInfo(state, payload) {
      state.googleInfo = payload;
    },
    toggleForgotPsw(state, payload) {
      state.forgotPsw = !state.forgotPsw;
      state.isLoginOpen = payload;
    },
    toggleRegister(state, payload) {
      state.isRegister = payload;
    },
    //確定登入
    loginOk(state, payload) {
      state.login = payload;
      state.isLoginOpen = false;
    },
    //確認登入
    toggleLoginModal(state,payload){
      state.loginModal = payload;
    },
    setToStorage(state) {
      localStorage.setItem(state.userTokenKey, state.member.email);
    },
    loginOut(state) {
      state.login = false;
      state.keepLoginStatus = false;
      localStorage.clear(state.userTokenKey, state.member.email);
      state.member = {};
    },
    //保持登入狀態
    toggleLoginStatus(state) {
      state.keepLoginStatus = !state.keepLoginStatus;
    }



  },
  actions: {


  },
  modules: {
  }
})
