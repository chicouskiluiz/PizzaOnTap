@extends('layouts.index')

@section('content')
  <products :products="'{{$products}}'"></products>
@endsection