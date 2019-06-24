@extends('layouts.index')

@section('content')
  <products :pizzas="{{$pizzas}}" :drinks="{{$drinks}}"></products>
@endsection