@extends('admin.layout.main')
@section('content')
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th scope="col" width="5%">ID</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Thời gian đăng ký</th>
                <th scope="col">Hủy tư cách</th>
            </tr>
        </thead>
        @foreach ($data as $item)
            <tbody>
                <tr>
                    <td scope="col" class="text-center">{{ $item->id }}</td>
                    <td scope="col">{{ $item->name }}</td>
                    <td scope="col">{{ $item->email }}</td>
                    <td scope="col">{{ $item->created_at }}</td>
                    <td scope="col" width="10%" class="text-center">
                        <a onclick="return confirm('Bạn có chắc chắn xóa ?')"
                            href="{{ route('admin.users.delete', ['id' => $item->id]) }}"
                            class="btn btn-warning mt-1">Hủy</a>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection
@section('sidebar')
    @include('admin.layout.sidebar')
@endsection
