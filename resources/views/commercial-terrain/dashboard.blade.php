@extends('commercial-terrain.layouts.main')
@section('content')
<div class="home-tab">
    <div class="tab-content tab-content-basic">
        <div class="row">
            <div class="col-sm-12 card">
            <div class="statistics-details d-flex align-items-center justify-content-between card-body" style="margin-bottom: 0px">
                <div>
                    <p class="statistics-title">Pc Code</p>
                    <h3 class="rate-percentage">{{auth()->user()->pc_code ?? ""}}</h3>
                </div>
                <div>
                    <p class="statistics-title">Total inscrits</p>
                    <h3 class="rate-percentage">{{$total_inscrits ?? 0}}</h3>
                </div>
                <div>
                    <p class="statistics-title">Nouveaux inscris</p>
                    <h3 class="rate-percentage">{{$nouveaux_inscrits ?? 0}}</h3>
                </div>
            </div>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="card col-sm-12">
            <div class="card-body">
                <div class="card-title">
                    Meilleur commercial terrain du jour
                </div>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Nom du commercial</th>
                            <th>Addresse mail</th>
                            <th>N° de téléphone</th>
                            <th>Nombre total d'inscris</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($meilleurs_commerciaux as $commercial)
                                <tr>
                                    <td>{{$commercial->nom_prenoms ?? ""}}</td>
                                    <td>{{$commercial->mail ?? ""}}</td>
                                    <td>{{$commercial->telephone ?? ""}}</td>
                                    <td>{{$commercial->max_inscris ?? ""}}</td>
                                </tr>            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
    </div>
</div>    
@endsection