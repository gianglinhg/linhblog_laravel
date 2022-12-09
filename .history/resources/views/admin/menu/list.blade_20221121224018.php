@extends('admin.layout.main')
@section('content')
  <div class="container">
    @if(session()->has('message'))
      <div class="p-1 bg-green"><span class="text-white h5 ml-2">{{ session()->get('message') }}</span></div>
    @endif

  </div>
@endsection