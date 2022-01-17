@extends('admin.layouts.main')
@section('content')
<div class="card">
  @include('shared.alert-messages')
  <div class="card-body">
    <h4 class="card-title">Liste des utilisateurs</h4>
    <div style="text-align: right">
      <a href="#" class="btn btn-sm btn-primary">
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
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($commandes as $commande)
              <tr>
                  <td>
                    <a href="#">
                      {{$commande->utilisateur->nom_prenoms ?? ""}}
                    </a>
                  </td>
                  <td>{{$commande->service->nom ?? ""}}</td>
                  <td>{{$commande->created_at ?? ""}}</td>
                  <td>
                    <span class="{{'badge badge-opacity-success me-3 ' . $commande->status ?? ''}}">
                      {{$commande->status ?? ""}}
                    </span>
                  </td>
                  <td>
                    <a title="Supprimer">
                        <form action="#" method="POST" accept-charset="utf-8" class="d-inline">
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