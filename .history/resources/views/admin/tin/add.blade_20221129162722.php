@php
    $query = DB::table('loaitin')
        ->select('id', 'ten')
        ->get();
@endphp
@extends('admin.layout.main')
@section('content')
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
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" class="form-control" name="tieuDe" id="tittle" placeholder="Nhập tiêu đề">
                @error('tieuDe')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Tóm tắt</label>
                <textarea type="text" class="form-control" name="tomTat" id="summary"></textarea>
                @error('tomTat')
                    <span style="color:red">{{ $message }}</span>
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
                    @foreach ($query as $tin)
                        <option value="{{ $tin->id }}">{{ $tin->ten }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
            <div class="card-body">
                <div id="actions" class="row">
                    <div class="col-lg-6">
                        <div class="btn-group w-100">
                            <span class="btn btn-success col fileinput-button dz-clickable">
                                <i class="fas fa-plus"></i>
                                <span>Add files</span>
                            </span>
                            <button type="submit" class="btn btn-primary col start">
                                <i class="fas fa-upload"></i>
                                <span>Start upload</span>
                            </button>
                            <button type="reset" class="btn btn-warning col cancel">
                                <i class="fas fa-times-circle"></i>
                                <span>Cancel upload</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="fileupload-process w-100">
                            <div id="total-progress" class="progress progress-striped active" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table table-striped files" id="previews">

                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo mới</button>
            <a href="{{ route('admin.tin.list') }}" class="btn btn-success">Danh sách</a>
        </div>
        @csrf
    </form>
@endsection
@section('sidebar')
    @include('admin.layout.sidebar')
@endsection
