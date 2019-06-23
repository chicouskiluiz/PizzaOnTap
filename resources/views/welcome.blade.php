@extends('layouts.index')

@section('content')

    <section>
        <v-parallax src="/img/pizzaWall.jpg" height="600">
            <v-layout column align-center justify-center class="black--text">
            <v-card>
                <v-img src="/img/pizzaicon.png" alt="Vuetify.js" height="220"></v-img>
                <v-card-text>
                    <h1 class="mb-2 display-1 text-xs-center">PizzaOnTap</h1>
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
                            <div class="headline">Informações</div>
                        </v-card-title>
                        <v-card-text>
                            Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare.
                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti.
                        </v-card-text>
                    </v-card>
                </v-flex>
                <v-flex xs12 sm4 offset-sm1>
                    <v-card class="elevation-0 transparent">
                        <v-card-title primary-title class="layout justify-center">
                            <div class="headline">Contato</div>
                        </v-card-title>
                        <v-card-text>
                            Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare.
                        </v-card-text>
                        <v-list class="transparent">
                            <v-list-tile>
                                <v-list-tile-action>
                                    <v-icon class="blue--text text--lighten-2">phone</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>(42) 3333-3333</v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile>
                                <v-list-tile-action>
                                    <v-icon class="blue--text text--lighten-2">place</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>Guarapuava, PR</v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile>
                                <v-list-tile-action>
                                    <v-icon class="blue--text text--lighten-2">email</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>contato@pizzaontap.com</v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
    </section>

@endsection
