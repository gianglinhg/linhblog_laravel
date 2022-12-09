@if (Session::has('error'))
    <div class="alert alert-danger error">
        {{ Session::get('error') }}
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-danger error">
        {{ Session::get('success') }}
    </div>
@endif
