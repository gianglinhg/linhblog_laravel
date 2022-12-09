@extends('admin.layout.main')
@section('content')
@if(session('msg'))
  <div class="alert alert-success mt-1">{{Session('msg')}}</div>
@endif
{{-- @if($errors -> any())
  <div class="alert alert-danger mt-1">Dữ liệu không hợp lệ</div>
@endif --}}
<form action="{{route('loaitin.post_edit')}}" method="POST" class="p-3">
  <div class="form-group">
    <label for="">Tên loại tin</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Tên loại tin" value="{{old('name') ?? $tinDetail->ten}}">
    @error('name')
      <span style="color:red">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group">
    <label for="">Thứ tự</label>
    <input type="number" class="form-control" name="thutu" id="thutu" placeholder="Thứ tự" value="{{old('thutu') ?? $tinDetail->thuTu}}">
    @error('thutu')
      <span style="color:red">{{$message}}</span>
    @enderror
  </div>
  <div class="mt-2">
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{route('loaitin.list')}}" class="btn btn-success">Danh sách</a>
  </div>
  @csrf
</form>
@endsection