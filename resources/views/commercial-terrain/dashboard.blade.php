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
</div>    
@endsection