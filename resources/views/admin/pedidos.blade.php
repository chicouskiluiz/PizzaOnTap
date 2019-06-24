@extends('layouts.admin')

@section('content')
    <admin-orders :desserts="{{$orders}}"></admin-orders>
@endsection
