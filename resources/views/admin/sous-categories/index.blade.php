@extends('admin.layouts.main')
@section('content')
<div class="card">
  @include('shared.alert-messages')
  <div class="card-body">
    <h4 class="card-title">Liste des sous categories</h4>
    <div style="text-align: right">
      <a href="{{route('admin.sous-categories.create')}}" class="btn btn-sm btn-primary">
          <i class=" mdi mdi-plus font-20" style="vertical-align: middle"></i> Créer une sous categorie
      </a>
    </div>
    {{-- <p class="card-description">
      Add class 
    </p> --}}
    <div class="table-responsive pt-3">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Categorie</th>
            <th>Sous categorie</th>
            <th>Date de création</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sous_categories as $sous_categorie)
              <tr>
                <td>
                  <a href="{{ route('admin.categories.edit', $sous_categorie->categorie->id) }}">
                    {{$sous_categorie->categorie->nom ?? ""}}
                  </a>
                </td>
                <td>
                  <a href="{{ route('admin.sous-categories.edit', $sous_categorie->id) }}">
                    {{$sous_categorie->nom ?? ""}}
                  </a>
                </td>
                <td>{{$sous_categorie->created_at ?? ""}}</td>
                <td>
                  <a title="Supprimer">
                      <form action="{{route('admin.sous-categories.destroy', $sous_categorie->id)}}" method="POST" accept-charset="utf-8" class="d-inline">
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