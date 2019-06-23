<template>
  <v-dialog v-show="show" v-model="showLogin" persistent max-width="500px" :fullscreen="$vuetify.breakpoint.xsOnly">
    <v-btn flat color="primary" dark slot="activator">Entrar</v-btn>
    <v-card>
      <v-card-title>
        <span class="headline">Entrar</span>
      </v-card-title>
      <v-card-text>
        <v-form ref="loginForm" v-model="valid">
          <v-text-field name="email" label="E-mail" v-model="email" :rules="emailRules" :error="errors['email']" :error-messages="errors['email']" required></v-text-field>
          <v-text-field name="password" label="Senha" v-model="password" :rules="passwordRules" min="6" type="password" required></v-text-field>
        </v-form>
        <v-container grid-list-md text-xs-center>
          <v-layout row wrap>
            <v-flex xs6>
              <v-btn flat href="/password/reset">Lembrar Senha</v-btn>
            </v-flex>
            <v-flex xs6>
              <v-btn flat href="/register">Registrar</v-btn>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="blue darken-2" flat @click.native="showLogin = false">Fechar</v-btn>
        <v-btn color="blue darken-2" class="white--text" @click.native="login" :loading="loginLoading">Entrar</v-btn>
        <v-spacer></v-spacer>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
  import * as actions from '../store/action-types'
  import withSnackbar from './mixins/withSnackbar'
  export default {
    mixins: [withSnackbar],
    data () {
      return {
        errors: [],
        internalAction: this.action,
        email: '',
        emailRules: [
          (v) => !!v || 'O endereço de email é obrigatório.',
          (v) => /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'O endereço de email precisa ser válido.'
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
      showLogin: {
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
            'email': this.email,
            'password': this.password
          }
          this.$store.dispatch(actions.LOGIN, credentials).then(response => {
            this.loginLoading = false
            this.showLogin = false
            window.location.reload()
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
    }
  }
</script>
