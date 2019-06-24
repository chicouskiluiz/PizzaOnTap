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
              <v-radio v-for="(value, index) in size" :key="index" :label="value.name + ' - ' + value.slice + ' pedaços. Com direito a ' + value.num_flavor + ' sabor(es) por R$ ' + value.price + '.'" :value="index"></v-radio>
            </v-radio-group>
          </v-card-text>
          <v-card-actions>
            <v-btn color="primary" @click="etapa = 2">Continuar</v-btn>
            <v-btn flat>Fechar</v-btn>
          </v-card-actions> 
        </v-card>
      </v-stepper-content>

      <v-stepper-content step="2">
        <v-card>
          <v-card-text>
            <v-radio-group v-for="capSabor in size[tamanho].num_flavor" :key="'sabor' + capSabor" v-model="sabores[capSabor - 1]" column>
              <v-radio v-for="(value, index) in flavor" :key="index" :label="value.name + ' - ' + value.description + '.'" :value="index"></v-radio>
            </v-radio-group>
          </v-card-text>
        </v-card>

        <v-btn color="primary" @click="etapa = 3">Continuar</v-btn>
        <v-btn flat>Resetar</v-btn>
      </v-stepper-content>

      <v-stepper-content step="3">
        <v-card>
          <v-card-text>
            <v-switch v-for="(adicional, index) in additional" :key="'adicional' + index" v-model="adicionais" :label="adicional.name" :value="index"></v-switch>
          </v-card-text>
        </v-card>

        <v-btn color="primary" @click="etapa = 4">Continuar</v-btn>
        <v-btn flat>Resetar</v-btn>
      </v-stepper-content>

      <v-stepper-content step="4">
        <v-card height="200px"></v-card>

        <v-btn color="primary" @click="etapa = 1">Comprar</v-btn>
        <v-btn flat>Resetar</v-btn>
      </v-stepper-content>
    </v-stepper-items>
  </v-stepper>
</template>

<script>
export default {
  data () {
    return {
      etapa: 1,
      tamanho: 0,
      sabores: [],
      adicionais: []
    }
  },
  props: ['flavor', 'size', 'additional'],
  created () {
    console.log(this.flavor)
    console.log(this.size)
    console.log(this.additional)
  },
  methods: {
  }
}
</script>
