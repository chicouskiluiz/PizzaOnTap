<template>
  <v-dialog v-show="show" v-model="showCart" absolute>
    <v-btn flat slot="activator">Carrinho</v-btn>
    <div class="box">
      <span v-if="!hasProduct()">Sem produtos</span>
      <div v-for="(product, index) in getProductsInCart"  :key="index" class="box-item">
        <img :src="product.image" alt="" class="item-thumb">
        <h3 class="item-name">{{ product.name }}</h3>
        <span class="item-amount">Amount: 1</span>
        <span class="item-price">R$ {{ product.price }}, 00</span>
      </div>
      <div class="cart-info" v-if="hasProduct()">
        <span>Total: R$ {{ totalPrice() }}, 00</span>
        <router-link to="/checkout">
          <btn btnColor="btn btn-small btn-info"
            @click.native="showPopupCart()">
            Ver Carrinho
          </btn>
        </router-link>
      </div>
    </div>
  </v-dialog>
</template>

<script>
  import { mapGetters } from 'vuex';
  import * as actions from '../store/action-types'
  import withSnackbar from './mixins/withSnackbar'
  export default {
    mixins: [withSnackbar],
    data () {
      return {
        errors: [],
        internalAction: this.action,
        cpf: '',
        cpfRules: [
          (v) => !!v || 'CPF é obrigatório.',
          (v) => v.length === 11 || 'CPF precisa ter 11 dígitos.'
        ],
        password: '',
        passwordRules: [
          (v) => !!v || 'Senha é obrigatória',
          (v) => v.length >= 6 || 'A senha precisa ter ao menos 6 dígitos.'
        ],
        valid: false,
        loginLoading: false
      }
    },
    props: {
      action: {
        type: String,
        default: null
      },
      show: {
        type: Boolean,
        default: true
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
            window.location = '/home'
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

<style scoped>
  .box {
    width: 400px;
    height: auto;
    background-color: #FAFAFA;
    box-shadow: 0px 0px 10px rgba(73, 74, 78, 0.1);
    border-radius: 5px;
    box-sizing: border-box;
    padding: 1em .5em;
    position: absolute;
    z-index: 1;
  }
  .box:after {
    content: '';
    width: 30px;
    height: 30px;
    transform: rotate(45deg);
    background: inherit;
    position: absolute;
    top: -15px;
    right: 15px;
  }
  .box-item {
    width: 100%;
    height: 130px;
    background-color: #fff;
    box-sizing: border-box;
    border-radius: 3px;
    padding: 0 .5em;
    margin-top: .3em;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(3, 1fr);
  }
  .item-thumb {
    max-width: 70%;
    grid-column: 1/2;
    grid-row: 1/4;
    align-self: center;
  }
  .item-name {
    grid-column: 2/4;
    grid-row: 1/2;
    font-weight: normal;
  }
  .item-amount {
    grid-column: 2/3;
    grid-row: 2/4;
    color: #ddd;
  }
  .cart-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
</style>