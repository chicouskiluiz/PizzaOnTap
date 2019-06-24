<template>
<v-card>
    <v-card-text v-if="!hasProduct()"><center>Você não tem nenhum produto adicionado.</center></v-card-text>
    <v-layout wrap>
      <v-flex xs12 sm6 md4>
        <v-card-text v-for="(product, index) in getProductsInCart" :key="index">
          <template v-if="product.category == 'custom'">
            <h3>{{ product.size.name }} <v-btn small flat @click="remove(index)">X</v-btn></h3>
            <tr v-for="sabor in product.flavors">
              <td>{{sabor.name}}</td>
            </tr>
            <tr v-for="adicionais in product.additionals">
              <td>{{adicionais.name}}</td>
            </tr>
            <span>R$ {{ totalPriceProduct(product) }}</span>
          </template>
          <template v-if="product.category == 'pizzas'">
            <h3>{{ product.name }}</h3>
            <span>R$ {{ product.price }}</span>
          </template>
          <template v-if="product.category == 'drinks'">
            <h3>{{ product.name }} <v-btn small flat @click="remove(index)">X</v-btn></h3>
            <span>R$ {{ product.price }}</span>
          </template>
        </v-card-text>
      </v-flex>
      <v-flex xs12 sm6 md4>
        <v-card-text>
          Endereço: {{address[0].address}}, {{address[0].number}}, {{address[0].complement}}
        </v-card-text>
        <v-card-text>
          Bairro: {{address[0].neighborhood}}
        </v-card-text>
        <v-card-text>
          CEP: {{address[0].cep}}
        </v-card-text>
      </v-flex>
    </v-layout>
    <v-card-text v-if="hasProduct()">
      <span>Total: R$ {{ totalPrice() }}</span>
    </v-card-text>
    <v-card-actions>
      <v-spacer></v-spacer>
      <v-layout wrap>
        <v-flex xs12 sm6 md4>
          <v-select v-model="meioPagamento" :items="meiosPagamento" label="Tipo de Pagamento"></v-select>
        </v-flex>
        <v-flex xs12 sm6 md4>
          <v-btn>Pedir</v-btn>
        </v-flex>
      </v-layout>
    </v-card-actions>
  </v-card>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import * as actions from '../store/action-types'
export default {
  data () {
    return {
      meiosPagamento: ["Cartão de Débito", "Cartão de Crédito", "Dinheiro"],
      meioPagamento: ''
    }
  },
  computed: {
    ...mapGetters([
      'getProductsInCart',
    ]),
  },
  props: ['address'],
  methods: {
    ...mapActions([
      'removeProduct',
    ]),
    hasProduct() {
      return this.getProductsInCart.length > 0;
    },

    totalPriceProduct (product) {
      var preco = parseFloat(product.size.price)
      for (var i = 0; i < product.additionals.length; i++) {
        preco = preco + parseFloat(product.additionals[i].price)
      }

      return preco
    },

    totalPrice() {
      var preco = 0
      for (var i = 0; i < this.getProductsInCart.length; i++) {
        if (this.getProductsInCart[i].category == 'custom') {
          preco = preco + parseFloat(this.getProductsInCart[i].size.price)
          for (var j = 0; j < this.getProductsInCart[i].additionals.length; j++) {
            preco = preco + parseFloat(this.getProductsInCart[i].additionals[j].price)
          }
        } else {
          preco = preco + parseFloat(this.getProductsInCart[i].price)
        }
      }

      return preco
    },

    remove(index) {
      this.removeProduct(index);
    },

    comprar() {
      var produtos = {
        lista: this.getProductsInCart,
        meioPagamento: this.meioPagamento
      }

      this.$store.dispatch(actions.NEWORDER, produtos).then(response => {
        this.loginLoading = false
        this.showLogin = false
        window.location.reload()
      })
    },
  },
};
</script>