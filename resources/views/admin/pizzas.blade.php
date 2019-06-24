@extends('layouts.admin')

@section('content')
    <admin-pizzas :desserts="{{$pizzas}}" :sizes="{{$sizes}}" :flavors="{{$flavors}}"></admin-pizzas>
@endsection
