<form class="forms-sample" action="/admin/prestations{{ isset($prestation) ? '/' . $prestation->id : '' }}" method="POST">
    @csrf
    @method($method ?? "POST")
    <div class="form-group">
      <label for="sous_categorie_id">Sous categories</label>
      <select class="form-control" name="sous_categorie_id" id="sous_categorie_id">
          @foreach ($sous_categories as $sous_categorie)
          <option value={{isset($sous_categorie) ? $sous_categorie->id : ""}} 
            {{ ( isset($prestation->sous_categorie) && $prestation->sous_categorie->id == $sous_categorie->id) ? "selected" : null }}>
            {{$sous_categorie->nom}}
          </option>
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="" value="{{ $prestation->nom ?? '' }}">
    </div>
    <button type="submit" class="btn btn-primary me-2">Enregister</button>
    <button class="btn btn-secondary" onclick="event.preventDefault(); history.back()">Annuler</button>
</form>