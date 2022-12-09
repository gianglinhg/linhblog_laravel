@extends('admin.layout.main')
@section('head')
  <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
  <style>
    .ck-editor__editable[role="textbox"] {
      min-height: 150px;
    }
    .ck-content .image {
      max-width: 80%;
      margin: 20px auto;
    }
    </style>
@endsection()
@section('content')
<form action="" method="post">
  <div class="card-body">
    <div class="form-group">
      <label for="">Tên danh mục</label>
      <input type="text" name="name" class="form-control" placeholder="Tên danh mục">
    </div>
    <div class="form-group">
      <label for="">Danh mục</label>
      <select name="parent_id" class="form-control">
        <option value="0">Danh mục cha</option>
      </select>
    </div>
    <div class="form-group">
      <label for="">Mô tả ngắn</label>
      <textarea type="text" name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="">Mô tả chi tiết</label>
      <textarea type="text" name="content" id="content" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label>Kích hoạt</label>
      <div class="custom-control custom-radio">
        <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
        <label for="active" class="custom-control-label">Có</label>
      </div>
      <div class="custom-control custom-radio">
        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
        <label for="no_active" class="custom-control-label">Không</label>
      </div>
    </div>

    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Tạo danh mục</button>
  </div>
</form>
@endsection
@section('footer')
  <script>
    ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
  </script>
@endsection