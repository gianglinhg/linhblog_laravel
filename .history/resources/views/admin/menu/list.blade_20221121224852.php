@extends('admin.layout.main')
@section('content')
  <div class="container">
    @if(session()->has('message'))
      <div class="p-1 bg-green"><span class="text-white h5 ml-2">{{ session()->get('message') }}</span></div>
    @endif
    <table class="table table-bordered">
      <thead style="text-align:center;">
        <tr>
          <th scope="col" width="5%">#</th>
          <th scope="col">Danh mục</th>
          <th scope="col" width="10%">Thao tác</th>
        </tr>
      </thead>
      @foreach($query as $item)
      <tbody>
        <tr>
          <td scope="col">{{$item->id}}</td>
          <td scope="col">{{$item->ten}}</td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
@endsection