@extends('admin.layout.main')
@section('content')
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th scope="col" width="10%">Mã bình luận</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Thời gian bình luận</th>
                <th scope="col">Tin</th>
            </tr>
        </thead>
        @if (!empty($comment))
            @foreach ($comment as $item)
                <tbody>
                    <tr>
                        <td scope="col" class="text-center">{{ $item->id }}</td>
                        <td scope="col">
                            <h4><b>{{ $item->content }}</b></h4>
                        </td>
                        <td scope="col">{{ date('H:i:s  d-m-Y', strtotime($item->created_at)) }}</td>
                        <td scope="col"><a href="/tin/{{ $item->id_tin }}">{{ $item->tieuDe }}</a></td>
                        {{-- <td scope="col" width="10%" class="text-center">
                            <a href="{{ route('tin.update', ['id' => $item->id]) }}" class="btn btn-primary">Sửa</a>
                            <a onclick="return confirm('Bạn có chắc chắn xóa ?')"
                                href="{{ route('tin.delete', ['id' => $item->id]) }}" class="btn btn-warning mt-1">Xóa</a>
                        </td> --}}
                    </tr>
                </tbody>
            @endforeach
        @else
            <tr>
                <td>#</td>
                <td>Không có thông tin</td>
            </tr>
        @endif
    </table>
@endsection
