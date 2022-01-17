<form class="forms-sample" action="/admin/services{{ isset($service) ? '/' . $service->id : '' }}" method="POST">
    @csrf
    @method($method ?? "POST")
    <div class="form-group">
      <label for="prestation_id">Prestations</label>
      <select class="form-control" name="prestation_id" id="prestation_id">
          @foreach ($prestations as $prestation)
          <option value={{isset($prestation) ? $prestation->id : ""}} 
            {{ ( isset($service->prestation) && $service->prestation->id == $prestation->id) ? "selected" : null }}>
            {{$prestation->nom}}
          </option>
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="nm">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="" value="{{ $service->nom ?? '' }}">
    </div>
    <div class="form-group">
      <label for="prix">Prix</label>
      <input type="number" class="form-control" id="prix" name="prix" placeholder="" value="{{ $service->prix ?? '' }}">
    </div>
    <div class="form-group">
      <label for="nom">Type</label>
      <select class="form-control" name="type" id="type">
        @foreach ($types as $type)
          <option value={{$type ?? ""}} 
            {{ ( isset($service->type) && $service->type == $type) ? "selected" : null }}>
            {{$type}}
          </option>
          @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary me-2">Enregister</button>
    <button class="btn btn-secondary" onclick="event.preventDefault(); history.back()">Annuler</button>
</form>