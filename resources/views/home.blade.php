@extends('layouts.index')

@section('content')
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
@endsection
