@if ($errors->any())
    <div class="col-md">
        <div class="card">
            <h5 class="card-header">Errors</h5>
            <div class="card-body">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif