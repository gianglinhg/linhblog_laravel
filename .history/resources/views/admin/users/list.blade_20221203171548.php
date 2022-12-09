@extends('admin.layout.main')
@section('content')
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th scope="col" width="5%">ID</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Thời gian đăng ký</th>
                <th scope="col">Hủy tư cách</th>
            </tr>
        </thead>
        @forelse ($data as $item)
            <tbody>
                <tr>
                    <td scope="col" class="text-center">{{ $item->id }}</td>
                    <td scope="col" class="text-center">
                        <img src="/template/{{ $item->avatar }}" width="50px" class="rounded-circle">
                    </td>
                    <td scope="col">{{ $item->name }}</td>
                    <td scope="col">{{ $item->email }}</td>
                    <td scope="col">{{ $item->created_at }}</td>
                    <td scope="col">{{ date('H:i:S d-M-Y', strtotime($item->created_at)) }}</td>
                    <td scope="col" width="10%" class="text-center">
                        <a onclick="return confirm('Bạn có chắc chắn xóa ?')"
                            href="{{ route('admin.users.delete', ['id' => $item->id]) }}"
                            class="btn btn-warning mt-1">Hủy</a>
                    </td>
                </tr>
            </tbody>
        @empty
            <tr>
                <td>#</td>
                <td>Không có tài khoản nào</td>
            </tr>
        @endforelse
    </table>
@endsection
@section('sidebar')
    @include('admin.layout.sidebar')
@endsection
