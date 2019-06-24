<template>
  <v-flex d-flex xs12 sm12 md12>
    <v-card fluid>
      <v-card-actions>
        <v-btn @click="selected = 'pizzas'">Pizzas</v-btn>
        <v-btn @click="selected = 'drinks'">Bebidas</v-btn>
        <v-spacer />
        <v-text-field v-model="search" append-icon="search" label="Procurar" single-line />
      </v-card-actions>
      <v-container fluid grid-list-md>
        <v-data-iterator :items="getCategory()" :search="search" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" content-tag="v-layout" row wrap>
          <v-flex slot="item" slot-scope="props" md3>
            <v-card>
              <v-system-bar>
                <span>{{ props.item.name }}</span>
              <v-spacer />
              </v-system-bar>
              <v-img :src="props.item.image"></v-img>
              <v-card-text>
                {{ props.item.description }}
              </v-card-text>
              <v-card-text>
                R$: {{ props.item.price }}
              </v-card-text>
              <v-card-actions>
                <v-btn color="primary" @click="comprar(props.item)">Adicionar ao Carrinho</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
          <v-flex slot="no-data">
            Sem produtos adicionados
          </v-flex>
        </v-data-iterator>
      </v-container>
    </v-card>
  </v-flex>
</template>

<script>
export default {
  data () {
    return {
      search: '',
      rowsPerPageItems: [12],
      pagination: {},
      selected: 'pizzas'
    }
  },
  props : ['pizzas', 'drinks'],
  methods: {
    getCategory () {
      if (this.selected == 'pizzas') {
        return this.pizzas
      } else if (this.selected == 'drinks') {
        return this.drinks
      }
    },

    comprar(product) {
      product.category = this.selected

      this.$store.dispatch('addProduct', product).then(response => {

      })
    }
  }
}
</script>
