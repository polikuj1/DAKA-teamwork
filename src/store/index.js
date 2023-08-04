import { createStore } from 'vuex'

export default createStore({
  state: {
    login: false,
    member: {},
    cart: [],
    isLoginOpen: false,
    forgotPsw: false,
    isRegister: false
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
    toggleLogin(state) {
      state.isLoginOpen = !state.isLoginOpen;
    },
    //給member物件
    setInfo(state, payload) {
      state.member = payload;
    },
    toggleForgotPsw(state, payload) {
      state.forgotPsw = !state.forgotPsw;
      state.isLoginOpen = payload;
    },
    toggleRegister(state, payload) {
      state.isRegister = !state.isRegister;
      state.isLoginOpen = payload;
    },
    //打開登入視窗
    loginToggle(state, payload) {
      state.login = payload;
      state.isLoginOpen = false;
    },
    loginOut(state) {
      state.login = false;
      state.member = {};
    }



  },
  actions: {


  },
  modules: {
  }
})
