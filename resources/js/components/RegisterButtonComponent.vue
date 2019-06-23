<template>
  <v-dialog fullscreen v-if="show" v-model="showRegister" persistent>
    <v-btn flat slot="activator">Registro</v-btn>
    <v-card>
      <v-card-title>
        <span class="headline">Registro de Usuário</span>
      </v-card-title>
      <v-card-text>
        <v-form ref="registrationForm" v-model="valid">
          <v-text-field label="CPF" v-model="cpf" :rules="cpfRules" required></v-text-field>
          <v-text-field label="Nome Completo" v-model="name" :rules="nameRules" required></v-text-field>
          <v-layout row wrap>
            <v-flex md6>
              <v-text-field label="Telefone" v-model="phone" :rules="phoneRules" required></v-text-field>
            </v-flex>
            <v-flex md6>
              <v-text-field label="E-mail" v-model="email" :rules="emailRules" :error="errors['email']" :error-messages="errors['email']" required></v-text-field>
            </v-flex>
          </v-layout>
          <v-layout row wrap>
            <v-flex md6>
              <v-text-field name="password" label="Senha" v-model="password" :rules="passwordRules" hint="Pelo menos 6 caracteres." :error="errors['password']" :error-messages="errors['password']" min="6" type="password" required></v-text-field>
            </v-flex>
            <v-flex md6>
              <v-text-field name="password" label="Confirmação de senha" v-model="passwordConfirmation" :rules="passwordConfirmationRules" :error="errors['password']" :error-messages="errors['password']" type="password" required></v-text-field>
            </v-flex>
          </v-layout>
        </v-form>
      </v-card-text>
      <v-card-text>
        <v-text-field label="Rua" v-model="address" :rules="addressRules" required></v-text-field>
          <v-layout row wrap>
            <v-flex md6>
              <v-text-field name="number" label="Numero" v-model="number" :rules="numberRules" required></v-text-field>
            </v-flex>
            <v-flex md6>
              <v-text-field name="cep" label="CEP" v-model="cep" :rules="cepRules" required></v-text-field>
            </v-flex>
          </v-layout>
          <v-layout row wrap>
            <v-flex md6>
              <v-text-field name="neighborhood" label="Bairro" v-model="neighborhood" :rules="neighborhoodRules" required></v-text-field>
            </v-flex>
            <v-flex md6>
              <v-text-field name="complement" label="Complemento" v-model="complement"></v-text-field>
            </v-flex>
          </v-layout>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" flat @click.native="showRegister = false">Fechar</v-btn>
          <v-btn :loading="registerLoading" color="blue darken-1" class="white--text" @click.native="register">Registrar</v-btn>
        </v-card-actions>
      </v-card>
  </v-dialog>
</template>

<style scoped>
    .facebook {
        width: 20px;
    }
</style>

<script>
  import * as actions from '../store/action-types'
  import withSnackbar from './mixins/withSnackbar'
  export default {
    mixins: [withSnackbar],
    data () {
      return {
        errors: [],
        internalAction: this.action,
        cpf: '',
        cpfRules: [
          (v) => !!v || 'CPF é obrigatório.',
          (v) => v.length === 11 || 'CPF precisa ter 11 dígitos.'
        ],
        name: '',
        nameRules: [
          (v) => !!v || 'O nome completo é obrigatório.'
        ],
        email: '',
        emailRules: [
          (v) => !!v || 'O endereço de email é obrigatório.',
          (v) => /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'O endereço de email precisa ser válido.'
        ],
        password: '',
        passwordRules: [
          (v) => !!v || 'A senha é obrigatória.',
          (v) => v.length >= 6 || 'A senha deve conter ao menos 6 caracteres.'
        ],
        passwordConfirmation: '',
        passwordConfirmationRules: [
          (v) => v === this.password || 'As senhas devem ser idênticas.'
        ],
        phone: '',
        phoneRules: [
          (v) => !!v || 'O telefone é obrigatório.',
          (v) => v.length >= 6 || 'A senha deve conter ao menos 6 caracteres.'
        ],
        cep: '',
        cepRules: [
          (v) => !!v || 'O CEP é obrigatório.',
        ],
        address: '',
        addressRules: [
          (v) => !!v || 'O endereço é obrigatório.',
        ],
        number: '',
        numberRules: [
          (v) => !!v || 'O número é obrigatório.',
        ],
        neighborhood: '',
        neighborhoodRules: [
          (v) => !!v || 'O vizinho é obrigatório.',
        ],
        complement: '',
        valid: false,
        registerLoading: false
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
      showRegister: {
        get () {
          if (this.internalAction && this.internalAction === 'register') return true
          return false
        },
        set (value) {
          if (value) this.internalAction = 'register'
          else this.internalAction = null
        }
      },
    },
    methods: {
      register () {
        if (this.$refs.registrationForm.validate()) {
          this.registerLoading = true
          const user = {
            'cpf': this.cpf,
            'name': this.name,
            'email': this.email,
            'password': this.password,
            'password_confirmation': this.passwordConfirmation,
            'phone': this.phone,

            'cep': this.cep,
            'address': this.address,
            'number': this.number,
            'neighborhood': this.neighborhood,
            'complement': this.complement,
          }
          this.$store.dispatch(actions.REGISTER, user).then(response => {
            this.registerLoading = false
            this.showRegister = false
            window.location.reload()
          }).catch(error => {
            if (error.response && error.response.status === 422) {
              this.showError({
                message: 'Invalid data'
              })
            } else {
              this.showError(error)
            }
            this.errors = error.response.data.errors
          }).then(() => {
            this.registerLoading = false
          })
        }
      },
    }
  }
</script>
