<template>
  <v-stepper v-model="etapa">
    <v-stepper-header>
      <v-stepper-step :complete="etapa > 1" step="1">Tamanho</v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step :complete="etapa > 2" step="2">Sabor</v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step :complete="etapa > 3" step="3">Adicionais</v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step step="4">Pedir</v-stepper-step>
    </v-stepper-header>

    <v-stepper-items>
      <v-stepper-content step="1">
        <v-card>
          <v-card-title>
            <span class="headline">Escolha o tamanho desejado:</span>
          </v-card-title>
          <v-card-text>
            <v-radio-group v-model="tamanho" column>
              <v-radio v-for="(value, index) in size" :key="index" :label="value.name + ' - ' + value.slice + ' pedaços. Com direito a ' + value.num_flavor + ' sabor(es) por R$ ' + value.price + '.'" :value="value"></v-radio>
            </v-radio-group>
          </v-card-text>
          <v-card-actions>
            <v-btn color="primary" @click="etapa = 2">Continuar</v-btn>
          </v-card-actions>
        </v-card>
      </v-stepper-content>

      <v-stepper-content step="2">
        <v-card>
          <v-card-text>
            <v-radio-group v-for="capSabor in tamanho.num_flavor" :key="'sabor' + capSabor" v-model="sabores[capSabor - 1]" column>
              <v-radio v-for="(value, index) in flavor" :key="index" :label="value.name + ' - ' + value.description + '.'" :value="value"></v-radio>
            </v-radio-group>
          </v-card-text>

          <v-card-actions>
            <v-btn color="primary" @click="etapa = 3">Continuar</v-btn>
            <v-btn flat @click="resetar">Resetar</v-btn>
          </v-card-actions>
        </v-card>
      </v-stepper-content>

      <v-stepper-content step="3">
        <v-card>
          <v-card-text>
            <v-switch v-for="(value, index) in additional" :key="'adicional' + index" v-model="adicionais" :label="value.name + ' - ' + value.description + '. Por: R$ ' + value.price + '.'" :value="value"></v-switch>
          </v-card-text>

          <v-card-actions>
            <v-btn color="primary" @click="calculaValor()">Continuar</v-btn>
            <v-btn flat @click="resetar">Resetar</v-btn>
          </v-card-actions>
        </v-card>
      </v-stepper-content>

      <v-stepper-content step="4">
        <v-card>
          <v-layout row wrap>
            <v-flex xs6>
              <v-card-text>
                Tamanho: {{tamanho.name}} - {{tamanho.price}}
              </v-card-text>
              <v-card-text>
                Sabores:
                <tr v-for="sabor in sabores">
                  <td>{{sabor.name}}</td>
                </tr>
              </v-card-text>
              <v-card-text v-if="adicionais.length > 0">
                Adicionais:
                <tr v-for="adicional in adicionais">
                  <td>{{adicional.name}} - {{adicional.price}}</td>
                </tr>
              </v-card-text>
            </v-flex>
            <v-flex xs6>
              <v-card-text>
                Valor Final: R$ {{valorFinal}}
              </v-card-text>
            </v-flex>
          </v-layout>

          <v-card-actions>
            <v-btn color="primary" @click="comprar()">Adicionar ao Carrinho</v-btn>
            <v-btn flat @click="resetar">Resetar</v-btn>
          </v-card-actions>
        </v-card>
      </v-stepper-content>
    </v-stepper-items>
  </v-stepper>
</template>

<script>
export default {
  data () {
    return {
      etapa: 1,
      tamanho: [],
      sabores: [],
      adicionais: [],
      valorFinal: 0
    }
  },
  props: ['flavor', 'size', 'additional'],
  methods: {
    calculaValor () {
      var preco = parseFloat(this.tamanho.price)
      for (var i = 0; i < this.adicionais.length; i++) {
        preco = preco + parseFloat(this.adicionais[i].price)
      }

      this.valorFinal = preco
      this.etapa = 4
    },

    resetar () {
      this.etapa = 1
      this.tamanho = []
      this.sabores = []
      this.adicionais = []
      this.valorFinal = 0
    },

    comprar() {
      var product = {
        category: 'custom',
        size: this.tamanho,
        additionals: this.adicionais,
        flavors: this.sabores
      }

      this.$store.dispatch('addProduct', product).then(response => {
        this.resetar()
      })
    }
  }
}
</script>
