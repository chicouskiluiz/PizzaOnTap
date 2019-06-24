@extends('layouts.index')

@section('content')
  <checkout :address="{{$address}}"></checkout>
@endsection
