@extends('layouts.admin')

@section('content')
    {{$sizes}}
    <admin-pizzas :desserts="{{$pizzas}}" :sizes="{{$sizes}}" :flavors="{{$flavors}}"></admin-pizzas>
@endsection
