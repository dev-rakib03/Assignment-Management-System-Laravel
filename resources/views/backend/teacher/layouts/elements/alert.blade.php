@if (Session::get('primary'))
    <div class="alert alert-primary" role="alert">
        {{ Session::get('primary') }}
    </div>
@endif

@if (Session::get('secondary'))
    <div class="alert alert-secondary" role="alert">
        {{ Session::get('secondary') }}
    </div>
@endif

@if (Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::get('danger'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('danger') }}
    </div>
@endif

@if (Session::get('warning'))
    <div class="alert alert-warning" role="alert">
        {{ Session::get('warning') }}
    </div>
@endif

@if (Session::get('info'))
    <div class="alert alert-info" role="alert">
        {{ Session::get('info') }}
    </div>
@endif

@if (Session::get('light'))
    <div class="alert alert-light" role="alert">
        {{ Session::get('light') }}
    </div>
@endif

@if (Session::get('dark'))
    <div class="alert alert-dark" role="alert">
        {{ Session::get('dark') }}
    </div>
@endif
