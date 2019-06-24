<template>
  <v-container fluid grid-list-md text-xs-center>
        <v-layout row wrap>
            <v-flex xs12>
                <v-card>
                    <v-card-title class="blue darken-3 white--text"><h2>Usuários</h2></v-card-title>
                    <v-card-text class="px-0 mb-2 hidden-sm-and-down">
                    <v-data-table :headers="headers" :items="desserts" class="elevation-1" hide-actions>
                        <template v-slot:items="props">
                        <td>{{ props.item.id }}</td>
                        <td>{{ props.item.name }}</td>
                        <td>{{ props.item.cpf }}</td>
                        <td>{{ props.item.phone }}</td>
                        <td>{{ props.item.email }}</td>
                        </template>
                    </v-data-table>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
export default {
  data () {
    return {
      headers: [
        { text: 'ID', value: 'id' },
        { text: 'Nome', value: 'name' },
        { text: 'CPF', value: 'cpf' },
        { text: 'Telefone', value: 'phone' },
        { text: 'Email', value: 'email' }
      ]
    }
  },
  props : ['desserts']
}
</script>
