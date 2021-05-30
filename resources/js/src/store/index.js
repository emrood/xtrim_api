import Vue from 'vue'
import Vuex from 'vuex'
import Setting from './Setting/index'
import Ecommerce from './Ecommerce/index'
import Chat from './Chat/index'
import Todo from './Todo/index'
Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Setting,
    Ecommerce
  },
  state: {
  },
  mutations: {
  },
  actions: {
  },
  getters: {
  },
  strict: debug
})
