@foreach ($errors->all() as $message)
    <div class="alert alert-danger" role="alert">
        <strong>Erreur!</strong> {{ $message }}
    </div>
@endforeach

@if (session('error'))
<div class="alert alert-danger" role="alert">
    <strong>Erreur!</strong> {{ session('error') }}
</div>
@endif

@if (session('success'))
<div class="alert alert-success" role="alert">
    <strong>Succes!</strong> {{ session('success') }}
</div>
@endif