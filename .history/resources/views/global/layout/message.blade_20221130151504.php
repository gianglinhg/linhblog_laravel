@if (Session::has('error'))
    <div class="alert alert-danger error">
        {{ Session::get('error') }}
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success success">
        {{ Session::get('success') }}
    </div>
@endif

{{-- @if (session()->has('success'))
    <div class="p-1 bg-success">
        <span class="text-white h5 ml-2">{{ session()->get('success') }}</span>
    </div>
@endif
@if (session()->has('error'))
    <div class="p-1 bg-danger">
        <span class="text-white h5 ml-2">{{ session()->get('error') }}</span>
    </div>
@endif --}}
