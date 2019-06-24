<template>
  <v-card>
    <v-card-text v-if="!hasProduct()">Você não tem nenhum produto adicionado.</v-card-text>
    <v-card-text v-for="(product, index) in getProductsInCart"  :key="index">
      <img :src="product.image" alt="">
      <h3 class="item-name">{{ product.name }}</h3>
      <span class="item-price">R$ {{ product.price }}, 00</span>
    </v-card-text>
    <v-card-text class="cart-info" v-if="hasProduct()">
      <span>Total: R$ {{ totalPrice() }}, 00</span>
      <router-link to="/checkout">
        <btn btnColor="btn btn-small btn-info"
          @click.native="showPopupCart()">
          Ver Carrinho
        </btn>
      </router-link>
    </v-card-text>
  </v-card>
</template>

<script>
  import { mapGetters } from 'vuex';
  import * as actions from '../store/action-types'
  import withSnackbar from './mixins/withSnackbar'
  export default {
    mixins: [withSnackbar],
    data () {
      return {
        internalAction: this.action
      }
    },
    props: {
      action: {
        type: String,
        default: null
      }
    },
    computed: {
      ...mapGetters([
        'getProductsInCart',
      ]),
      showCart: {
        get () {
          if (this.internalAction && this.internalAction === 'login') return true
          return false
        },
        set (value) {
          if (value) this.internalAction = 'login'
          else this.internalAction = null
        }
      }
    },
    methods: {
      login () {
        if (this.$refs.loginForm.validate()) {
          this.loginLoading = true
          const credentials = {
            'cpf': this.cpf,
            'password': this.password
          }
          this.$store.dispatch(actions.LOGIN, credentials).then(response => {
            this.loginLoading = false
            this.showLogin = false
          }).catch(error => {
            console.log('HEY:')
            console.log(error.response.data)
            if (error.response && error.response.status === 422) {
              this.showError({
                message: 'Invalid data',
              })
            } else {
              this.showError(error)
            }
            this.errors = error.response.data.errors
          }).then(() => {
            this.loginLoading = false
          })
        }
      },
      hasProduct() {
        return this.getProductsInCart.length > 0;
      },
      totalPrice() {
        return this.getProductsInCart.reduce((current, next) =>
          current + next.price, 0);
      },
    }
  }
</script>
