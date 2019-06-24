<template>
  <v-card>
    <v-card-text v-if="!hasProduct()">Você não tem nenhum produto adicionado.</v-card-text>
    <v-card-text v-for="(product, index) in getProductsInCart" :key="index">
      <template v-if="product.category == 'custom'">
        <h3>{{ product.size.name }}</h3>
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
        <h3>{{ product.name }}</h3>
        <span>R$ {{ product.price }}</span>
      </template>
    </v-card-text>
    <v-card-text v-if="hasProduct()">
      <span>Total: R$ {{ totalPrice() }}</span>
      <v-btn href="/checkout">Ver Carrinho</v-btn>
    </v-card-text>
  </v-card>
</template>

<script>
  import { mapGetters } from 'vuex';
  export default {
    data () {
      return {
      }
    },
    computed: {
      ...mapGetters([
        'getProductsInCart',
      ])
    },
    methods: {
      hasProduct() {
        return this.getProductsInCart.length > 0;
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

      totalPriceProduct (product) {
        var preco = parseFloat(product.size.price)
        for (var i = 0; i < product.additionals.length; i++) {
          preco = preco + parseFloat(product.additionals[i].price)
        }

        return preco
      }
    }
  }
</script>
