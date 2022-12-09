<style>
    .padding{
        margin: 0;
        padding: 12px 28px 0 0;
    }
    .alert-danger ul li{
        list-style-type: none;
    }
</style>
    @if ($errors->any())
        <div class="alert alert-danger padding">
            <ul >
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger error">
            {{Session::get('error')}}
        </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-danger error">
            {{Session::get('success')}}
        </div>
    @endif