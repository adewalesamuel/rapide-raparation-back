@extends('admin.layouts.main')
@section('content')
<div class="card">
  @include('shared.alert-messages')
  <div class="card-body">
    <h4 class="card-title">Liste des commandes</h4>
    <div style="text-align: right">
      <a href="{{route('admin.commandes.create')}}" class="btn btn-sm btn-primary">
          <i class=" mdi mdi-plus font-20" style="vertical-align: middle"></i> Créer une commande
      </a>
    </div>
    {{-- <p class="card-description">
      Add class 
    </p> --}}
    <div class="table-responsive pt-3">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Client</th>
            <th>Service</th>
            <th>Date de commande</th>
            <th>Status</th>
            <th>Niveau</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($commandes as $commande)
              <tr>
                  <td>
                    <a href="{{route('admin.utilisateurs.edit', $commande->utilisateur_id)}}">
                      {{$commande->utilisateur->nom_prenoms ?? ""}}</td>
                    </a>
                  </td>
                  <td>
                    <a href="{{route('admin.services.edit', $commande->service_id)}}">
                      {{$commande->service->nom ?? ""}}
                  </td>
                    </a>
                  <td>{{$commande->created_at ?? ""}}</td>
                  <td>
                    <span class="{{'badge badge-opacity-success me-3 ' . $commande->status ?? ''}}">
                      {{$commande->status ?? ""}}
                    </span>
                  </td>
                  <td>
                    <span class="badge badge-opacity-danger me-3" style="font-weight: bolder">
                      {{$commande->is_urgent ? "URGENT" : ''}}
                    </span>
                  </td>
                  <td>
                    <a href="{{route('admin.commandes.edit', $commande->id)}}">
                      <button class="btn btn-light btn-sm text-info">
                        <i class="mdi mdi-border-color font-18"></i>
                      </button>
                    </a>
                    <a title="Supprimer">
                        <form action="{{route('admin.commandes.destroy', $commande->id)}}" method="POST" accept-charset="utf-8" class="d-inline">
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