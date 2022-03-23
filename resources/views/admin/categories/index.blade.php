@extends('admin.layouts.main')
@section('content')
<div class="card">
  @include('shared.alert-messages')
  <div class="card-body">
    <h4 class="card-title">Liste des categories</h4>
    <div style="text-align: right">
      <a href="{{route('admin.categories.create')}}" class="btn btn-sm btn-primary">
          <i class=" mdi mdi-plus font-20" style="vertical-align: middle"></i> Créer une categorie
      </a>
    </div>
    {{-- <p class="card-description">
      Add class 
    </p> --}}
    <div class="table-responsive pt-3">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Date de création</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $categorie)
              <tr>
                  <td>
                    <a href="{{ route('admin.categories.edit', $categorie->id) }}">
                      {{$categorie->nom ?? ""}}
                    </a>
                  </td>
                  <td>{{$categorie->created_at ?? ""}}</td>
                  <td>
                    <a title="Supprimer">
                        <form action="{{route('admin.categories.destroy', $categorie->id)}}" method="POST" accept-charset="utf-8" class="d-inline">
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