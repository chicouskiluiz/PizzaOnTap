<template>
  <v-flex d-flex xs12 sm12 md12>
    <v-card fluid>
      <v-card-actions>
        <v-spacer />
        <v-spacer />
        <v-text-field v-model="search" append-icon="search" label="Procurar" single-line />
      </v-card-actions>
      <v-container fluid grid-list-md>
        <v-data-iterator :items="products" :search="search" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" content-tag="v-layout" row wrap>
          <v-flex slot="item" slot-scope="props" md2>
            <v-card>
              <v-system-bar>
                <span>{{ props.item.name }}</span>
                <v-spacer />
                <v-tooltip v-if="!props.item.approved" bottom>
                  <v-icon slot="activator">flag</v-icon>
                  <span>Aprovado</span>
                </v-tooltip>
                <v-tooltip v-if="props.item.deleted" bottom>
                  <v-icon slot="activator">delete</v-icon>
                  <span>Deletado</span>
                </v-tooltip>
                <v-tooltip v-if="!props.item.enabled" bottom>
                  <v-icon slot="activator">lock</v-icon>
                  <span>Permitido</span>
                </v-tooltip>
              </v-system-bar>
              <v-card-media :src="props.item.image">
                <v-card height="105px" width="100%" class='white--text' color="transparent" flat tile>
                  <v-card-text class="transprent-text body-2">
                    {{ props.item.smallDescription }}
                  </v-card-text>
                </v-card>
              </v-card-media>
              <v-system-bar>
                <v-spacer />
                <v-tooltip v-if="props.item.canEdit" bottom>
                  <v-btn small class="mx-0" icon slot="activator" @click="editGame(props.item)"><v-icon>settings</v-icon></v-btn>
                  <span>Editar</span>
                </v-tooltip>
                <v-tooltip bottom>
                  <v-btn small class="mx-0" icon slot="activator" @click="infoGame(props.item)"><v-icon>info</v-icon></v-btn>
                  <span>Detalhes</span>
                </v-tooltip>
                <v-tooltip v-if="props.item.lastGame" bottom>
                  <v-btn small class="mx-0" icon slot="activator" @click="newGame(props.item)"><v-icon>add_circle</v-icon></v-btn>
                  <span>Novo Jogo</span>
                </v-tooltip>
                <v-tooltip v-if="props.item.lastGame" bottom>
                  <v-btn small class="mx-0" icon slot="activator" @click="continueGame(props.item)"><v-icon>play_circle_filled</v-icon></v-btn>
                  <span>Continuar</span>
                </v-tooltip>
                <v-tooltip v-if="!props.item.lastGame" bottom>
                  <v-btn small class="mx-0" icon slot="activator" @click="newGame(props.item)"><v-icon>play_circle_filled</v-icon></v-btn>
                  <span>Jogar</span>
                </v-tooltip>
              </v-system-bar>
            </v-card>
          </v-flex>
          <v-flex slot="pageText" slot-scope="props">
            {{ $ml.with('a', pagination.page).with('t', Math.ceil(props.itemsLength / pagination.rowsPerPage)).get('lobby.block.allScenes.pagination') }}
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
      pagination: {}
    }
  },
  props : ['products'],
  methods: {
    infoGame (scene) {
      this.$store.dispatch('setSceneDetailInfo', scene)
    },
  }
}
</script>
