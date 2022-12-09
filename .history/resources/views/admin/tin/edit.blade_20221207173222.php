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
                {{-- {{ dd($query) }} --}}
                <select class="form-control" name="idLT" id="idLT">
                    @foreach ($query as $loaitin)
                        <option value="{{ $loaitin->id }}" @if ($t->idLT == $loaitin->id) selected @endif>
                            {{ $loaitin->ten }}
                        </option>
                    @endforeach
                </select>
            </div>
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
