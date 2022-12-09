@extends('admin.layout.main')
@section('content')
@if(session('msg'))
  <div class="alert alert-danger mt-1">{{Session('msg')}}</div>
@endif
<div class="thaotac m-2 float-right">
  <a href="{{route('loaitin.add')}}" class="btn btn-success">Thêm loại tin</a>

</div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên</th>
      <th scope="col">Thứ tự</th>
      <th scope="col">Ẩn hiện</th>
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
      <td>{{$val->anHien}}</td>
      <td><a href="{{route('loaitin.edit',['id'=>$val->id])}}" class="btn btn-primary">Sửa</a></td>
      <td>
        <a onclick="return confirm('Bạn có chắc chắn xóa ?')"
        href="{{route('loaitin.delete',['id'=>$val->id])}}" class="btn btn-warning">Xóa</a>
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