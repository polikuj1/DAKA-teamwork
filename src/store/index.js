import { createStore } from 'vuex'

export default createStore({
  state: {
   login:false,
  
    cart: [],
  },
  getters: {
  },
  mutations: {
    getBook(state,item) {
      state.cart.push(item);
    },
    deleteBook(state,index) {
      state.cart.splice(index,1);
    }
  },
  actions: {
  },
  modules: {
  }
})
