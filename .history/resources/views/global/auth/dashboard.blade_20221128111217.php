@extends('admin.layout.main')
@section('content')
  @if(session()->has('success'))
    <div class="p-1 bg-success">
      <span class="text-white h5 ml-2">{{ session()->get('success')}}</span>
    </div>
  @endif
  @if(session()->has('error'))
    <div class="p-1 bg-danger">
      <span class="text-white h5 ml-2">{{ session()->get('error')}}</span>
    </div>
  @endif
  <table class="table table-bordered">
    <thead class="text-center">
      <tr>
        <th scope="col" width="5%">Mã bình luận</th>
        <th scope="col">Nội dung</th>
        <th scope="col" width="10%">Thao tác</th>
      </tr>
    </thead>
    @if(!empty($data))
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
          <a href="{{route('tin.update',['id'=>$item->id])}}" class="btn btn-primary">Sửa</a>
          <a onclick="return confirm('Bạn có chắc chắn xóa ?')"
          href="{{route('tin.delete',['id'=>$item->id])}}" class="btn btn-warning mt-1">Xóa</a>
        </td>
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