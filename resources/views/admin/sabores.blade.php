@extends('layouts.admin')

@section('content')
    <admin-flavors :desserts="{{$flavors}}"></admin-flavors>
@endsection
