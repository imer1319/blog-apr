@extends('admin.layout')

@section('content')
<h5>{{ auth()->user()->name }}</h5>
@endsection
