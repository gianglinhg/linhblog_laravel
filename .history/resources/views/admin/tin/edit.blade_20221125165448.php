@php
  $nameTin = DB::table('loaitin')->where('id',$t->idLT)->value('ten');
  $query = DB::table('loaitin')->select('id','ten')->get();
@endphp
@extends('admin.layout.main')
@section('content')
<div class="card card-primary mt-5">
  <form action="{{route('tin.post_update')}}" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label>Tiêu đề</label>
        <input type="text" class="form-control" name="tieuDe" id="title" value="{{$t->tieuDe}}">
        @error('tieuDe')
          <span style="color:red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label>Tóm tắt</label>
        <textarea rows="3" class="form-control" name="tomTat" id="summary">{{$t->tomTat}}</textarea>
        @error('tomTat')
          <span style="color:red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label>Nội dung</label>
        <textarea rows="10" class="form-control" name="noiDung" id="content">{{$t->noiDung}}</textarea>
      </div>
      <div class="form-group">
        <label>url Hình</label>
        <input class="form-control" name="urlHinh" id="urlHinh" value="{{$t->urlHinh}}">
      </div>
      <div class="form-group">
        <label>Loại</label>
        <select class="form-control" name="idLT" id="idLT">
          @if($nameTin == "")
          <option value="{{$t->idLT}}" selected >Chưa có</option>
          @else
          <option value="{{$t->idLT}}" selected >{{$nameTin}}</option>
          @endif
          @foreach($query as $tin)
            <option value="{{$tin->id}}" >{{$tin->ten}}</option>
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
</div>
@endsection