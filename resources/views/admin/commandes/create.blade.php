@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Créer une nouvelle commande</h4>
                {{-- <p class="card-description">
                  Basic form layout
                </p> --}}
                @include('shared.alert-messages')
                @include('forms.commande', ['method' => 'POST'])
              </div>
            </div>
          </div>
    </div>
@endsection