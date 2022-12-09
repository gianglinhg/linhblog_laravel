@extends('admin.layout.main')
@section('content')
  {{-- @if(session()->has('success'))
    <div class="p-1 bg-success">
      <span class="text-white h5 ml-2">{{ session()->get('success')}}</span>
    </div>
  @endif
  @if(session()->has('error'))
    <div class="p-1 bg-danger">
      <span class="text-white h5 ml-2">{{ session()->get('error')}}</span>
    </div>
  @endif --}}
  {{-- <div class="m-2 float-right">
    <a href="{{route('tin.add')}}" class="btn btn-primary">Thêm tin tức</a>
  </div> --}}
  <table class="table table-bordered">
    <thead class="text-center">
      <tr>
        <th scope="col" width="5%">ID</th>
        <th scope="col">Tên</th>
        <th scope="col">Email</th>
        <th scope="col">Thời gian đăng ký</th>
        <th scope="col">Vai trò</th>
      </tr>
    </thead>
    @foreach ($data as $item)
    <tbody >
      <tr>
        <td scope="col" style="text-align: center">{{$item->id}}</td>
        <td scope="col">{{$item->name}}</td>
        <td scope="col">{{$item->email}}</td>
        <td scope="col">{{$item->created_at}}</td>
        <td scope="col">{{$item->role_name}}</td>
        <td scope="col" width="10%" class="text-center" >
          <a href="{{route('tin.delete',['id'=>$item->id])}}" class="btn btn-warning mt-1">Xóa</a>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
@endsection