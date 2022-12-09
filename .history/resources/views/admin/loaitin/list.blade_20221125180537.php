@extends('admin.layout.main')
@section('content')
  @if(session()->has('success'))
    <div class="p-1 bg-success">
      <span class="text-white h5 ml-2">{{ session()->get('success')}}</span>
    </div>
  @endif
  @if(session()->has('error'))
    <div class="p-1 bg-danger">
      <span class="text-white h5 ml-2">{{ session()->get('error')}}</span>
    </div>
  @endif
  <div class="m-2 float-right">
    <a href="{{route('loaitin.add')}}" class="btn btn-primary">Thêm loại tin</a>
  </div>
<table class="table table-bordered text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên</th>
      <th scope="col">Thứ tự</th>
      <th scope="col">Ẩn hiện</th>
      <th scope="col" width="10%">Thao tác</th>
    </tr>
  </thead>
  <tbody>
    @if(!empty($tinList))
      @foreach($tinList as $key => $val)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$val->ten}}</td>
      <td>{{$val->thuTu}}</td>
      <td>{{$val->anHien}}</td>
      <td>
        <a href="{{route('loaitin.update',['id'=>$val->id])}}" class="btn btn-primary">Sửa</a>
        <a onclick="return confirm('Bạn có chắc chắn xóa ?')"
        href="{{route('loaitin.delete',['id'=>$val->id])}}" class="btn btn-warning mt-1">Xóa</a>
      </td>
    </tr>
    @endforeach
    @else
    <tr>
      <td>Không có tin tức</td>
    </tr>
    @endif
  </tbody>
</table>
@endsection