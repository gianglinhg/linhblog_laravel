@extends('layout')
@section('content')
@if(session('msg'))
  <div class="alert alert-danger mt-1">{{Session('msg')}}</div>
@endif
<h1>LIST</h1>
<a href="{{route('loaitin.add')}}" class="btn btn-primary">Thêm tin</a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên</th>
      <th scope="col" width="40%">Thứ tự</th>
      <th scope="col" width="5%">Sửa</th>
      <th scope="col" width="5%">Xóa</th>
    </tr>
  </thead>
  <tbody>
    @if(!empty($tinList))
      @foreach($tinList as $key => $val)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$val->ten}}</td>
      <td>{{$val->thuTu}}</td>
      <td><a href="{{route('loaitin.edit',['id'=>$val->id])}}" class="btn btn-warning btn-sm">Sửa</a></td>
      <td>
        <a onclick="return confirm('Bạn có chắc chắn xóa ?')"
        href="{{route('loaitin.delete',['id'=>$val->id])}}" class="btn btn-danger btn-sm">Xóa</a>
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