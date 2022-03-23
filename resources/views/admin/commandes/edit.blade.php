@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-12">
          @include('shared.alert-messages')
          <div class="row">
            <div class="col-lg-8 col-sm-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="card-title mb-4">Information du client</div>
                  <div class="row mb-3">
                    <div class="col-4"><b>Nom & Prenom(s) :</b></div>
                    <div class="col-8">{{ $commande->utilisateur->nom_prenoms ?? "" }}</div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4"><b>Nom de l'entreprise</b></div>
                    <div class="col-8">{{ $commande->utilisateur->nom_entreprise ?? "" }}</div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4"><b>Numéro de téléphone :</b></div>
                    <div class="col-8">{{ $commande->utilisateur->telephone ?? "" }}</div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4"><b>Email :</b></div>
                    <div class="col-8">{{ $commande->utilisateur->mail ?? "" }}</div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4"><b>PC CODE :</b></div>
                    <div class="col-8">{{ $commande->utilisateur->pc_code ?? "" }}</div>
                  </div>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="card-title mb-4">Information de la commande</div>
                  <div class="row mb-3">
                    <div class="col-4"><b>Date de commande :</b></div>
                    <div class="col-8">{{ $commande->created_at ?? "" }}</div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4"><b>Service :</b></div>
                    <div class="col-8">{{ $commande->service->nom ?? "" }}</div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4"><b>Prestation :</b></div>
                    <div class="col-8">{{ $commande->service->prestation->nom ?? "" }}</div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4"><b>Description :</b></div>
                    <div class="col-8">{{ $commande->description ?? "" }}</div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4"><b>Addresse :</b></div>
                    <div class="col-8">{{ $commande->lieu ?? "" }}</div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4"><b>Date d'exécution :</b></div>
                    {{-- <div class="col-8">{{ $commande->date_execution ?? "" }}</div> --}}
                    <div class="col-8">
                      <input type="date" name="date_execution" value="{{$commande->date_execution ? date('Y-m-d', strtotime($commande->date_execution)):  "" }}" id="date_execution" form="commande">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4"><b>Note du client :</b></div>
                    <div class="col-8">{{ $commande->note ?? "" }}</div>
                  </div>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="card-title mb-4">Information visite technique</div>
                  <div class="row mb-3">
                    <div class="col-4"><b>Necessite visite :</b></div>
                    <div class="col-8">
                      <label for="visite-true">Oui</label>
                      <input type="radio" name="has_visite_technique" id="visite-true" value="{{true}}" {{$commande->has_visite_technique ? "checked" : null }} form="commande">
                      &nbsp;&nbsp;
                      <label for="visite-false">Non</label>
                      <input type="radio" name="has_visite_technique"  value="{{false}}" id="visite-false" {{$commande->has_visite_technique ? null : "checked" }} form="commande">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4"><b>Note de la visite :</b></div>
                    <div class="col-8">
                      <textarea class="form-control" name="note_visite_technique" id="" style="height: 80px" form="commande">{{ $commande->note_visite_technique ?? "" }}</textarea>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
            <div class="col-lg-4 col-sm-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="card-title mb-4">Suivi</div>
                  <div class="col-12 mb-2"><b>Gestion commande :</b> {{$commande->commercial->nom_prenoms ?? ""}}</div>
                  <div class="col-12 mb-2"><b>Resp technique :</b> {{$commande->responsable_technique->nom_prenoms ?? ""}}</div>
                  <div class="col-12 mb-2"><b>Technicien :</b> {{$commande->technicien->nom_prenoms ?? ""}}</div>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="card-title mb-4">Montant</div>
                  <div class="col-12 mb-2"><b>Prévisionel :</b> {{$commande->service->prix ?? ""}} Fcfa</div>
                  <div class="col-12 mb-2"><b>Coût après visite :</b>
                    <input type="number" name="prix" value="{{$commande->prix ?? '' }}" id="prix" form="commande"> Fcfa              
                  </div>
                  <div class="col-12 mb-2"><b style="font-size: 22px">Montant total :</b> 
                    <span id="total-commande">{{$commande->prix ?? $commande->service->prix}}</span>
                  </div>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="card-title mb-4">Action de le commande</div>
                  <form action="/admin/commandes{{ isset($commande) ? '/' . $commande->id : '' }}" id="commande" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="utilisateur_id" value="{{$commande->utilisateur_id ?? ''}}">
                    <input type="hidden" name="service_id" value="{{$commande->service_id ?? ''}}">
                    <input type="hidden" name="quantite" value="{{$commande->quantite ?? ''}}">
                    <input type="hidden" name="responsable_technique_id" value="{{$commande->responsable_technique_id ?? ''}}">
                    <input type="hidden" name="materiel" value="{{$commande->materiel ?? ''}}">
                    <input type="hidden" name="lieu" value="{{$commande->lieu ?? ''}}">
                    <input type="hidden" name="description" value="{{$commande->description ?? ''}}">
                    <input type="hidden" name="note" value="{{$commande->note ?? ''}}">
                    <input type="hidden" name="order_id" value="{{$commande->order_id ?? ''}}">
                    <div class="form-group">
                      <select class="form-control" name="status" id="status">
                          @foreach ($statuses as $status)
                            <option value={{$status}} {{ ( isset($commande) && $commande->status == $status) ? "selected" : null }}>{{$status}}</option>
                          @endforeach
                      </select>
                  </div>
                  <button type="submit" class="btn btn-primary me-2">Valider</button>
                  {{-- <button class="btn btn-secondary" onclick="event.preventDefault(); history.back()">Annuler</button> --}}
                  </form>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>
@endsection