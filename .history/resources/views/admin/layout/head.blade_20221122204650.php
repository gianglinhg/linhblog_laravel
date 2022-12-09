<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{$title}}</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">
{{-- Panigation --}}
{{-- <link rel="stylesheet" href="/template/client/style.css"> --}}

<script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
<style>
  /* Ck editor */
  .ck-editor__editable[role="textbox"] {
    min-height: 200px;
  }
  .ck-content .image {
    max-width: 80%;
    margin: 20px auto;
  }

  /* Panigation */
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
.page-link:hover,
.page-link:focus {
    color: #111 !important;
}

.page-item:first-child .page-link {
    margin-left: 0;
    border-radius: 0;
}

.page-item:last-child .page-link {
    border-radius: 0;
}
</style>

@stack('head')
