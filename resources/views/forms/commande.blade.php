<form class="forms-sample" action="/admin/commandes{{ isset($commande) ? '/' . $commande->id : '' }}" method="POST">
    @csrf
    @method($method ?? "POST")
    <div class="form-group">
      <label for="utilisateur_id">Client</label>
      <select class="form-control" name="utilisateur_id" id="utilisateur_id">
        @foreach ($utilisateurs as $utilisateur)
        <option value={{isset($utilisateur) ? $utilisateur->id : ""}} 
          {{ ( isset($commande) && $commande->utilisateur_id == $utilisateur->id) ? "selected" : null }}>
          {{$utilisateur->nom_prenoms}}
        </option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
      <label for="service_id">Service</label>
      <select class="form-control" name="service_id" id="service_id">
        @foreach ($services as $service)
        <option value={{isset($service) ? $service->id : ""}} 
          {{ ( isset($commande) && $commande->service_id == $service->id) ? "selected" : null }}>
          {{$service->nom}}
        </option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
      <label for="quantite">Quantite</label>
      <input type="number" class="form-control" id="quantite"  name="quantite" placeholder="" value="{{ $commande->quantite ?? 1 }}">
    </div>
    <div class="form-group">
        <label for="lieu">Lieu de livraison</label>
        <input type="text" class="form-control" id="lieu"  name="lieu" placeholder="" value="{{ $commande->lieu ?? '' }}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="" style="height: 80px">
        {{ $commande->description ?? '' }}
      </textarea>
    </div>
    <button type="submit" class="btn btn-primary me-2">Enregister</button>
    <button class="btn btn-secondary" onclick="event.preventDefault(); history.back()">Annuler</button>
</form>