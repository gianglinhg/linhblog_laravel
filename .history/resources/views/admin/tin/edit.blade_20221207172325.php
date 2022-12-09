@php
    $query = DB::table('loaitin')
        ->select('id', 'ten')
        ->get();
@endphp
@extends('admin.layout.main')
@section('content')
    {{-- <div class="card card-primary"> --}}
    {{-- {{ dd(route('admin.tin.post_update')) }} --}}
    <form action="{{ route('admin.tin.post_update') }}" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" class="form-control" name="tieuDe" id="title" value="{{ $t->tieuDe }}">
                @error('tieuDe')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Tóm tắt</label>
                <textarea rows="3" class="form-control" name="tomTat" id="summary">{{ $t->tomTat }}</textarea>
                @error('tomTat')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea rows="10" class="form-control" name="noiDung" id="content">{{ $t->noiDung }}</textarea>
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <div class="input-group">
                    <input type=text class="form-control mr-2" value="{{ $t->urlHinh }}">
                    <input class="form-control ml-2" type="file" id="formFile" name="image">
                </div>
            </div>
            <div class="form-group">
                <label>Loại</label>
                    {{-- @php
                    dd($t->id);
                    @endphp --}}
                <select class="form-control" name="idLT" id="idLT">
                    {{-- @if ($nameTin == '')
                        <option value="{{ $t->idLT }}" selected>Chưa có</option>
                    @else
                        <option value="{{ $t->idLT }}" selected>{{ $nameTin }}</option>
                    @endif --}}
                    @foreach ($query as $tin)
                        @if($tin->id == $t->id)
                            <option value="{{ $tin->id }}">{{ $tin->ten }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            {{-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.tin.list') }}" class="btn btn-success">Danh sách</a>
        </div>
        @csrf
    </form>
    {{-- </div> --}}
@endsection
@section('sidebar')
    @include('admin.layout.sidebar')
@endsection
