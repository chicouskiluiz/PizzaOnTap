@extends('layouts.index')

@section('content')

    <section>
        <v-parallax src="/img/pizzaWall.jpg" height="600">
            <v-layout column align-center justify-center class="black--text">
            <v-card>
                <v-img src="/img/pizzaicon.png" alt="Vuetify.js" height="220"></v-img>
                <v-card-text>
                    <h1 class="mb-2 display-1 text-xs-center">BomSabor Pizzaria</h1>
                    <div class="subheading mb-3 text-xs-center">O sabor da verdadeira pizza</div>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn class="lighten-2 mt-5" dark large href="/cardapio">Cardápio</v-btn>
                    <v-btn class="lighten-2 mt-5" dark large href="/montesua">Monte a sua</v-btn>
                    <v-spacer></v-spacer>
                </v-card-actions>
                </v-card>
            </v-layout>
        </v-parallax>
    </section>

    <section>
        <v-container grid-list-xl>
            <v-layout row wrap justify-center class="my-5">
                <v-flex xs12 sm4>
                    <v-card class="elevation-0 transparent">
                        <v-card-title primary-title class="layout justify-center">
                            <div class="headline">Sobre nós</div>
                        </v-card-title>
                        <v-card-text>
                            Com mais de 8 anos no mercado a pizzaria BomSabor trabalha para garantir o bem estar e satisfação dos seus clientes. Sempre trabalhamos com alegria e tendo a certeza de criar produtos de qualidade e fornecendo o melhor atendimento aos nossos clientes. Bom apetite!
                        </v-card-text>
                    </v-card>
                </v-flex>
                <v-flex xs12 sm4 offset-sm1>
                    <v-card class="elevation-0 transparent">
                        <v-card-title primary-title class="layout justify-center">
                            <div class="headline">Contato</div>
                        </v-card-title>
                        <v-card-text>
                            Horário de atendimento todos os dias das 18:00 as 23:30.
                        </v-card-text>
                        <v-list class="transparent">
                            <v-list-tile>
                                <v-list-tile-action>
                                    <v-icon class="blue--text text--lighten-2">phone</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>(42) 9 1234-5678</v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile>
                                <v-list-tile-action>
                                    <v-icon class="blue--text text--lighten-2">place</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>Rua João Pessoa Filho, 1057, Centro</v-list-tile-title>
                                    <v-list-tile-title>Guarapuava, PR</v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile>
                                <v-list-tile-action>
                                    <v-icon class="blue--text text--lighten-2">email</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>contato@bomsabor.com</v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
    </section>

@endsection
