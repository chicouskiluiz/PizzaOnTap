@extends('layouts.index')

@section('content')
  <makeour :flavor="{{$flavor}}" :size="{{$size}}" :additional="{{$additional}}"></makeour>
@endsection
