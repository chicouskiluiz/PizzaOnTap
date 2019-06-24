@extends('layouts.admin')

@section('content')
    <admin-flavours :desserts="{{$flavors}}"></admin-flavours>
@endsection
