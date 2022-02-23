@extends('admin.layouts.main')
@section('content')
<div class="card mb-4 col-lg-6 col-sm-12">
  <div class="card-body">
    <h4 class="card-title">Rapport spécifique - Commercial terrain</h4>
    <form class="forms-sample" action="" method="GET">
      @csrf
      <div class="form-group">
        <label for="date_debut">Date debut</label>
        <input type="date" class="form-control" id="date_debut" name="date_debut">
      </div>
      <div class="form-group">
        <label for="date_fin">Date fin</label>
        <input type="date" class="form-control" id="date_fin" name="date_fin">
      </div>
      <div class="form-group">
        <label for="pc_code">Pc code</label>
        <input type="text" class="form-control" id="pc_code" name="pc_code" 
        placeholder="" value="{{ request()->query('pc_code') ?? '' }}">
      </div>
      <button type="submit" class="btn btn-primary me-2">Rechercher</button>
  </form>
  </div>
</div>
<div class="card">
  @include('shared.alert-messages')
  <div class="card-body">
    <h4 class="card-title">Details de rapport</h4>
    <strong class="text-danger">Nombre de clients inscris : {{ count($clients)}}</strong>
    {{-- <p class="card-description">
      Add class 
    </p> --}}
    <div class="table-responsive pt-3">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Date d'inscription</th>
            <th>Nom Prénom(s)</th>
            <th>Contact</th>
            <th>Nom de l'entreprise</th>
            <th>Nom du commercial</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($clients as $client)
              <tr>
                  <td>{{$client->created_at ?? ""}}</td>
                  <td>
                    <a href={{ route('admin.utilisateurs.edit', $client->id) }}>
                      {{$client->nom_prenoms ?? ""}}
                    </a>
                  </td>
                  <td>{{$client->telephone ?? ""}}</td>
                  <td>{{$client->nom_entreprise ?? ""}}</td>
                  <td>{{$commercial->nom_prenoms ?? ""}}</td>
              </tr>            
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection