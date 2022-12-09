@extends('admin.layout.main')
@push('head')
    <style>
        .cmt_content {
            display: -webkit-box;
            max-width: 100%;
            height: 43px;
            margin: 0 auto;
            font-size: 14px;
            line-height: 1;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endpush
@section('content')
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th scope="col" width="10%">Mã bình luận</th>
                <th scope="col" width="50%">Nội dung</th>
                <th scope="col" width="15%">Thời gian bình luận</th>
                <th scope="col">Tin đã bình luận</th>
                <th scope="col" width="5%">Xóa</th>
            </tr>
        </thead>
        @forelse ($comment as $item)
            <tbody>
                <tr>
                    <td scope="col" class="text-center">{{ $item->id }}</td>
                    <td scope="col">
                        <h4><b>{{ $item->content }}</b></h4>
                    </td>
                    <td scope="col">{{ date('H:i:s  d-m-Y', strtotime($item->created_at)) }}</td>
                    <td scope="col"><a href="/tin/{{ $item->id_tin }}" class="cmt_title">{{ $item->tieuDe }}</a></td>
                    <td scope="col" width="10%" class="text-center">
                        <a onclick="return confirm('Bạn có chắc chắn xóa ?')"
                            href="{{ route('auth.deleteCmt', ['id' => $item->id]) }}" class="btn btn-warning mt-1">Xóa</a>
                        {{-- <button class="btn btn-primary">Button</button> --}}
                    </td>
                </tr>
            </tbody>
        @empty
            <tr>
                <td>#</td>
                <td>Không có thông tin</td>
            </tr>
        @endforelse
    </table>
@endsection
