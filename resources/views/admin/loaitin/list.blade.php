@extends('admin.layout.main')
@section('content')
    <div class="m-2 float-right">
        <a href="{{ route('admin.loaitin.add') }}" class="btn btn-primary">Thêm loại tin</a>
    </div>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên</th>
                <th scope="col">Thứ tự</th>
                <th scope="col">Hiện</th>
                <th scope="col" width="10%">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($tinList))
                @foreach ($tinList as $key => $val)
                    <tr>
                        <th scope="row">{{ $val->id }}</th>
                        <td>{{ $val->ten }}</td>
                        <td>{{ $val->thuTu }}</td>
                        @if ($val->anHien != 0)
                            <td>Có</td>
                        @else
                            <td>Không</td>
                        @endif
                        <td>
                            <a href="{{ route('admin.loaitin.update', ['id' => $val->id]) }}"
                                class="btn btn-primary">Sửa</a>
                            <a onclick="return confirm('Bạn có chắc chắn xóa ?')"
                                href="{{ route('admin.loaitin.delete', ['id' => $val->id]) }}"
                                class="btn btn-warning mt-1">Xóa</a>
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
@section('sidebar')
    @include('admin.layout.sidebar')
@endsection
