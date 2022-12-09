@extends('admin.layout.main')
@section('content')
  Chào {{Auth::user()->name}}
@endsection