@extends('layouts.admin')

@section('content')
    <admin-sizes :desserts="{{$sizes}}"></admin-sizes>
@endsection
