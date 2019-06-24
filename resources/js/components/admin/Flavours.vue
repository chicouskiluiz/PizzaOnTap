<template>
  <div>
    <v-toolbar flat color="white">
      <v-toolbar-title>Sabores</v-toolbar-title>
      <v-divider class="mx-2" inset vertical></v-divider>
      <v-spacer></v-spacer>
      <v-dialog v-model="dialog" max-width="500px">
        <template v-slot:activator="{ on }">
          <v-btn color="primary" dark class="mb-2" v-on="on">Novo item</v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">{{ formTitle }}</span>
          </v-card-title>

          <v-card-text>
            <v-container grid-list-md>
              <v-layout wrap>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.name" label="Nome"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.description" label="Descrição"></v-text-field>
                </v-flex>
              </v-layout>
            </v-container>
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" flat @click="close">Cancelar</v-btn>
            <v-btn color="blue darken-1" flat @click="save">Salvar</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-toolbar>
    <v-data-table :headers="headers" :items="desserts" class="elevation-1">
      <template v-slot:items="props">
        <td>{{ props.item.id }}</td>
        <td>{{ props.item.name }}</td>
        <td>{{ props.item.description }}</td>
        <td class="justify-center layout px-0">
          <v-icon small class="mr-2" @click="editItem(props.item)">edit</v-icon>
          <v-icon small @click="deleteItem(props.item)">delete</v-icon>
        </td>
      </template>
      <template v-slot:no-data>
        <h1>Sem dados</h1>
      </template>
    </v-data-table>
  </div>
</template>

<script>
import * as actions from '../../store/action-types'

export default {
  data () {
    return {
      dialog: false,
      headers: [
        { text: 'ID', value: 'id' },
        { text: 'Nome', value: 'name' },
        { text: 'Descrição', value: 'description' }
      ],
      editedIndex: -1,
      editedItem: {
        name: '',
        description: ''
      },
      defaultItem: {
        name: '',
        description: ''
      }
    }
  },
  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'Novo item' : 'Editar Item'
    }
  },
  watch: {
    dialog (val) {
      val || this.close()
    }
  },
  props : ['desserts'],
  methods: {
    editItem (item) {
      this.editedIndex = this.desserts.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },

    deleteItem (item) {
      confirm('Você tem certeza que quer deletar esse item?') && this.$store.dispatch(actions.DELETEFLAVOR, item.id).then(response => {
        window.location.reload()
      }).catch(error => {
        console.log('HEY:')
        console.log(error.response.data)
      })
    },

    close () {
      this.dialog = false
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      }, 300)
    },

    save () {
      if (this.editedIndex > -1) {
        Object.assign(this.desserts[this.editedIndex], this.editedItem)

        this.$store.dispatch(actions.UPDATEFLAVOR, this.editedItem).then(response => {
          window.location.reload()
        }).catch(error => {
          console.log('HEY:')
          console.log(error.response.data)
        })
      } else {
        this.desserts.push(this.editedItem)

        this.$store.dispatch(actions.NEWFLAVOR, this.editedItem).then(response => {
          window.location.reload()
        }).catch(error => {
          console.log('HEY:')
          console.log(error.response.data)
        })
      }
      this.close()
    }
  }
}
</script>
