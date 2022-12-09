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
          <td scope="col" width="10%" style="text-align:center;" >
            <a href="update/{{$item->id}}" class="btn btn-primary">Sửa</a>
            <a href="delete/{{$item->id}}" class="btn btn-warning mt-1">Xóa</a>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
@endsection