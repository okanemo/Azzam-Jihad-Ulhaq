@if (session('message-success'))
    <div class="alert alert-success" role="alert">
        {{ session('message-success') }}
    </div>
@endif

@if (session('message-danger'))
    <div class="alert alert-danger" role="alert">
        {{ session('message-danger') }}
    </div>
@endif
