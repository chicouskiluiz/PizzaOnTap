@extends('layouts.admin')

@section('content')
    <admin-pizzas :desserts="{{$pizzas}}" :sizes="{{$sizes}}" :flavors="{{$flavors}}" :relation="{{$relation}}"></admin-pizzas>
@endsection
