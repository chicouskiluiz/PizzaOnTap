import Vue from 'vue'
import Vuex from 'vuex'
import admin from './modules/admin'
import auth from './modules/auth'
import products from './modules/products'
import snackbar from './modules/snackbar'
import users from './modules/users'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    admin,
    auth,
    products,
    snackbar,
    users
  },
  strict: debug
})
