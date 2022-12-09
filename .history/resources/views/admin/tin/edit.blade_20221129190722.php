@php
    $query = DB::table('loaitin')
        ->select('id', 'ten')
        ->get();
@endphp
@extends('admin.layout.main')
@section('content')
    {{-- <div class="card card-primary"> --}}
    @if (session()->has('success'))
        <div class="p-1 bg-success">
            <span class="text-white h5 ml-2">{{ session()->get('success') }}</span>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="p-1 bg-danger">
            <span class="text-white h5 ml-2">{{ session()->get('error') }}</span>
        </div>
    @endif
    <form action="{{ route('admin.tin.post_update') }}" method="POST">
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
                <input class="form-control" name="urlHinh" id="urlHinh" value="{{ $t->urlHinh }}">
            </div>
            {{-- <div class="form-">
                <label>Thay đổi</label>
                <input class="form-control" type="file" id="formFile" name="image">
            </div> --}}
            <div class="form-group">
                <label>Loại</label>
                <select class="form-control" name="idLT" id="idLT">
                    @if ($nameTin == '')
                        <option value="{{ $t->idLT }}" selected>Chưa có</option>
                    @else
                        <option value="{{ $t->idLT }}" selected>{{ $nameTin }}</option>
                    @endif
                    @foreach ($query as $tin)
                        <option value="{{ $tin->id }}">{{ $tin->ten }}</option>
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
