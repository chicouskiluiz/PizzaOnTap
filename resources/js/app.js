
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('login-button', require('./components/LoginButtonComponent.vue').default);
Vue.component('register-button', require('./components/RegisterButtonComponent.vue').default);
Vue.component('remember-password', require('./components/RememberPasswordComponent.vue').default);
Vue.component('reset-password', require('./components/ResetPasswordComponent.vue').default);

Vue.component('products', require('./components/Products.vue').default);
Vue.component('makeour', require('./components/MakeOurPizza.vue').default);

Vue.component('cart', require('./components/Cart.vue').default);
Vue.component('checkout', require('./components/Checkout.vue').default);

Vue.component('admin-orders', require('./components/admin/Orders.vue').default);
Vue.component('admin-flavors', require('./components/admin/Flavors.vue').default);
Vue.component('admin-drinks', require('./components/admin/Drinks.vue').default);
Vue.component('admin-pizzas', require('./components/admin/Pizzas.vue').default);
Vue.component('admin-additionals', require('./components/admin/Additionals.vue').default);
Vue.component('admin-sizes', require('./components/admin/Sizes.vue').default);
Vue.component('admin-users', require('./components/admin/Users.vue').default);

window.Vuetify = require('vuetify');
Vue.use(Vuetify)

import VueLocalStorage from 'vue-localstorage'
Vue.use(VueLocalStorage)

import store from './store'
import * as actions from './store/action-types'
import * as mutations from './store/mutation-types'

import { mapGetters } from 'vuex'
import withSnackbar from './components/mixins/withSnackbar'

if (window.user) {
  store.commit(mutations.USER,  user)
  store.commit(mutations.LOGGED, true)
}

const app = new Vue({
  el: '#app',
  store,
  mixins: [ withSnackbar ],
  data: () => ({
    drawer: null,
    userInfo: false,
    carrinho: false,
    editingUser: false,
    logoutLoading: false,
    changingPassword: false,
    updatingUser: false,
    items: [
      { text: 'Pedidos', href: '/admin' },
      { text: 'Sabores', href: '/admin/sabores' },
      { text: 'Bebidas', href: '/admin/bebidas' },
      { text: 'Pizzas', href: '/admin/pizzas' },
      { text: 'Adicionais', href: '/admin/adicionais' },
      { text: 'Tamanhos', href: '/admin/tamanhos' },
      { text: 'Usuários', href: '/admin/usuarios' },
    ]
  }),
  computed: {
    ...mapGetters({
      user: 'user'
    })
  },
  methods: {
    editUser () {
      this.editingUser = true
      this.$nextTick(this.$refs.email.focus)
    },
    updateUser () {
      this.updatingUser = true
      this.$store.dispatch(actions.UPDATE_USER, this.user).then(response => {
        this.showMessage('Usuário modificado!')
      }).catch(error => {
        console.dir(error)
        this.showError(error)
      }).then(() => {
        this.editingUser = false
        this.updatingUser = false
      })
    },
    updateEmail (email) {
      this.$store.commit(mutations.USER, {...this.user, email})
    },
    updateName (name) {
      this.$store.commit(mutations.USER, {...this.user, name})
    },
    toggleUserDrawer () {
      this.userInfo = !this.userInfo
    },
    toggleCarrinhoDrawer () {
      this.carrinho = !this.carrinho
    },
    checkRoles (item) {
      if (item.role) {
        return this.$store.getters.roles.find(function (role) {
          return role == item.role // eslint-disable-line
        })
      }
      return true
    },
    logout () {
      this.logoutLoading = true
      this.$store.dispatch(actions.LOGOUT).then(response => {
        window.location = '/'
      }).catch(error => {
        console.log(error)
      }).then(() => {
        this.logoutLoading = false
      })
    },
    menuItemSelected (item) {
      if (item.href) {
        if (item.new) {
          window.open(item.href)
        } else {
          window.location.href = item.href
        }
      }
    },
    changePassword () {
      this.changingPassword = true
      this.$store.dispatch(actions.REMEMBER_PASSWORD, this.user.email).then(response => {
        this.showMessage(`Email sent to change password`)
      }).catch(error => {
        console.dir(error)
        this.showError(error)
      }).then(() => {
        this.changingPassword = false
      })
    }
  }
});
