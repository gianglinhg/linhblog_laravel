@php
  $query = DB::table('loaitin')->select('id','ten')->get();
@endphp
@extends('admin.layout.main')
@section('content')
  <!-- form start -->
  <form action="" method="POST">
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
    <div class="card-body">
      <div class="form-group">
        <label>Tiêu đề</label>
        <input type="text" class="form-control" name="tieuDe" id="tittle" placeholder="Nhập tiêu đề">
        @error('tieuDe')
          <span style="color:red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label>Tóm tắt</label>
        <textarea type="text" class="form-control" name="tomTat" id="summary"></textarea>
        @error('tomTat')
          <span style="color:red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label>Nội dung</label>
        <textarea type="text" class="form-control" name="noiDung" id="content"></textarea>
      </div>
      <div class="form-group">
        <label>url Hình</label>
        <input type="text" class="form-control" name="urlHinh" id="urlHinh">
      </div>
      <div class="form-group">
        <label>Loại</label>
        <select class="form-control" name="idLT" id="idLT">
          @foreach($query as $tin)
            <option value="{{$tin->id}}">{{$tin->ten}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

    @csrf
  </form>
@endsection