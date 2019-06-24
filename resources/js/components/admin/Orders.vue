<template>
  <div>
    <v-toolbar flat color="white">
      <v-toolbar-title>Pedidos</v-toolbar-title>
      <v-divider class="mx-2" inset vertical></v-divider>
    </v-toolbar>
    <v-data-table :headers="headers" :items="desserts" class="elevation-1">
        <template v-slot:items="props">
        <td>{{ props.item.id }}</td>
        <td>{{ props.item.name }}</td>
        <td>{{ props.item.phone }}</td>
        <td>{{ props.item.value }}</td>
        </template>
    </v-data-table>
  </div>
</template>

<script>
export default {
  data () {
    return {
      headers: [
        { text: 'ID', value: 'id' },
        { text: 'Nome', value: 'name' },
        { text: 'Telefone', value: 'phone' },
        { text: 'Valor', value: 'value' },
      ]
    }
  },
  props : ['desserts']
}
</script>
