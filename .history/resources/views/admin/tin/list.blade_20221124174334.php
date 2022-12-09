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
@section('searchTin')
  <form class="form-block" type="get" action="{{route('tin.search')}}">
    <div class="input-group input-group">
      <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm">
      <span class="input-group-append">
        <button type="submit" class="btn btn-info btn-flat">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </span>
    </div>
  </form>
@endsection
@section('content')
  @if(session()->has('message'))
    <div class="p-1 bg-green">
      <span class="text-white h5 ml-2">{{ session()->get('message') }}</span>
    </div>
  @endif
  <table class="table table-bordered">
    <thead class="text-center">
      <tr>
        <th scope="col" width="5%">ID</th>
        <th scope="col">Tin tức</th>
        <th scope="col" width="10%">Thao tác</th>
      </tr>
    </thead>
    @foreach ($data as $item)
    <tbody >
      <tr>
        <td scope="col" style="text-align: center">{{$item->id}}</td>
        <td scope="col">
          <h4><b>{{$item->tieuDe}}</b></h4>
          <p>{{$item->tomTat}}</p>
          <span>{{$item->ngayDang}}</span>
        </td>
        <td scope="col" width="10%" class="text-center" >
          <a href="update/{{$item->id}}" class="btn btn-primary">Sửa</a>
          <a href="delete/{{$item->id}}" class="btn btn-warning mt-1">Xóa</a>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
@endsection
@section('paginate')
    {{ $data->links('paginate') }}
@endsection