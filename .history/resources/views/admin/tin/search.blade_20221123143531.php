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
  @if(session()->has('message'))
    <div class="p-1 bg-green"><span class="text-white h5 ml-2">{{ session()->get('message') }}</span></div>
  @endif
  <table class="table table-bordered">
    <thead style="text-align:center;">
      <tr>
        <th scope="col" width="5%">#</th>
        <th scope="col">Tin tức</th>
        <th scope="col" width="10%">Thao tác</th>
      </tr>
    </thead>
    @foreach ($searchTin as $key => $item)
    <tbody >
      <tr>
        <td scope="col">{{$key+1}}</td>
        <td scope="col">
          <h4><b>{{$item->tieuDe}}</b></h4>
          <p>{{$item->tomTat}}</p>
          <span>{{$item->ngayDang}}</span>
        </td>
        <td scope="col" width="10%" style="text-align:center;" >
          <a href="update/{{$item->id}}" class="btn btn-primary btn-sm">Sửa</a>
          <a href="delete/{{$item->id}}" class="btn btn-warning btn-sm">Xóa</a>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
@endsection
{{-- @section('panigate')
    {{ $searchTin->links('panigate') }}
@endsection --}}