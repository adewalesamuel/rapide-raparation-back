@extends('admin.layouts.main')
@section('content')
<div class="card">
  @include('shared.alert-messages')
  <div class="card-body">
    <h4 class="card-title">Liste des utilisateurs “{{request()->query('type') ?? 'client'}}“</h4>
    <div style="text-align: right">
      <a href="{{ route('admin.utilisateurs.create') }}" class="btn btn-sm btn-primary">
          <i class=" mdi mdi-plus font-20" style="vertical-align: middle"></i> Créer un utilisateur
      </a>
    </div>
    {{-- <p class="card-description">
      Add class 
    </p> --}}
    <div class="table-responsive pt-3">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nom Prénom(s)</th>
            <th>Addresse mail</th>
            <th>N° de téléphone</th>
            <th>Type</th>
            <th>Nom de l'entreprise</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($utilisateurs as $utilisateur)
              <tr>
                  <td>
                    <a href={{ route('admin.utilisateurs.edit', $utilisateur->id) }}>
                      {{$utilisateur->nom_prenoms ?? ""}}
                    </a>
                  </td>
                  <td>{{$utilisateur->mail ?? ""}}</td>
                  <td>{{$utilisateur->telephone ?? ""}}</td>
                  <td>{{$utilisateur->type ?? ""}}</td>
                  <td>{{$utilisateur->nom_entreprise ?? ""}}</td>
                  <td>
                    <a title="Supprimer">
                        <form action="{{route('admin.utilisateurs.destroy', $utilisateur->id)}}" method="POST" accept-charset="utf-8" class="d-inline">
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