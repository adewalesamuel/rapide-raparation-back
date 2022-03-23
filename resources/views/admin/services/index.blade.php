@extends('admin.layouts.main')
@section('content')
<div class="card">
  @include('shared.alert-messages')
  <div class="card-body">
    <h4 class="card-title">Liste des services</h4>
    <div style="text-align: right">
      <a href="{{route('admin.services.create')}}" class="btn btn-sm btn-primary">
          <i class=" mdi mdi-plus font-20" style="vertical-align: middle"></i> Créer un service
      </a>
    </div>
    {{-- <p class="card-description">
      Add class 
    </p> --}}
    <div class="table-responsive pt-3">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Prestation</th>
            <th>Service</th>
            <th>Prix</th>
            <th>Type</th>
            <th>Date de création</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($services as $service)
              <tr>
                  <td>
                    <a href="{{ route('admin.prestations.edit', $service->prestation->id ?? '') }}">
                      {{$service->prestation->nom ?? ""}}
                    </a>
                  </td>
                  <td>
                    <a href="{{ route('admin.services.edit', $service->id) }}">
                      {{$service->nom ?? ""}}
                    </a>
                  </td>
                  <td>
                      {{$service->prix ?? ""}}
                  </td>
                  <td>
                      {{$service->type ?? ""}}
                  </td>
                  <td>{{$service->created_at ?? ""}}</td>
                  <td>
                    <a title="Supprimer">
                        <form action="{{route('admin.services.destroy', $service->id)}}" method="POST" accept-charset="utf-8" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light btn-sm text-danger">
                                <i class="mdi mdi-delete-forever font-18"></i>
                            </button>
                        </form>
                    </a> 
                  </td>
              </tr>            
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection