<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show"
             role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show"
             role="alert">
            <strong>{{ Session::get('error') }}</strong>
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif
</div>
