@extends('admin.layout.main')
@push('head')
    <style>
        .page-link {
            background-color: #edeff2 !important;
            border: 0 dashed #e2e2e2;
            border-radius: 0;
            color: #a3a5a8 !important;
            display: block;
            font-size: 14px;
            line-height: 1;
            margin-left: 6px;
            padding: 0.8rem 0.8rem;
            position: relative;
            text-transform: capitalize;
        }
    </style>
@endpush
@section('content')
    <div class="row m-2">
        <div class="col-10">
            <form action="" class="row" method="get">
                <div class="col-1">
                    <button type="submit" class="btn btn-primary btn-inline ">Lọc</button>
                </div>
                <div class="col-3">
                    <select name="searchLoaiTin" id="" class="form-control">
                        <option value="0">Tất cả</option>
                        @foreach ($loaitin as $menu)
                            <option value="{{ $menu->id }}" @if (request()->loaitin == $menu->id) selected @endif>
                                {{ $menu->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-7">
                    <input type="search" name="keywords" placeholder="Tìm kiếm" class="form-control"
                        value="{{ request()->keywords }}">
                </div>
            </form>
        </div>
        <div class="col-2 d-flex justify-content-end">
            <a href="{{ route('admin.tin.add') }}" class="btn btn-primary">Thêm tin tức</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th scope="col" width="5%">ID</th>
                <th scope="col" width="10%">Hình ảnh</th>
                <th scope="col">Tin tức</th>
                <th scope="col" width="10%">Thao tác</th>
            </tr>
        </thead>
        {{-- {{ $data }} --}}
        @foreach ($data as $item)
            <tbody>
                <tr>
                    <td scope="col" style="text-align: center">{{ $item->id }}</td>
                    <td scope="col"><img src="/template/{{ $item->urlHinh }}" alt="" width="150px"></td>
                    <td scope="col">
                        <h4><b>{{ $item->tieuDe }}</b></h4>
                        <p>{{ $item->tomTat }}</p>
                        <span>{{ date('d/m/Y', strtotime($item->ngayDang)) }}</span>
                        <span class="text-primary ml-1">{{ $item->ten }}</span>
                    </td>
                    <td scope="col" width="10%" class="text-center">
                        <a href="{{ route('admin.tin.update', ['id' => $item->id]) }}" class="btn btn-primary">Sửa</a>
                        <a onclick="return confirm('Bạn có chắc chắn xóa ?')"
                            href="{{ route('admin.tin.delete', ['id' => $item->id]) }}"
                            class="btn btn-warning mt-1">Xóa</a>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection
@section('paginate')
    {{ $data->links('global.layout.paginate') }}
@endsection
@section('sidebar')
    @include('admin.layout.sidebar')
@endsection
