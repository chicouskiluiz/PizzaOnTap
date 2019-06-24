@extends('layouts.admin')

@section('content')
    <admin-drinks :desserts="{{$drinks}}"></admin-drinks>
@endsection
