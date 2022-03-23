<form class="forms-sample" action="/admin/sous-categories{{ isset($sous_categorie) ? '/' . $sous_categorie->id : '' }}" method="POST">
    @csrf
    @method($method ?? "POST")
    <div class="form-group">
      <label for="categorie_id">Categories</label>
      <select class="form-control" name="categorie_id" id="categorie_id">
          @foreach ($categories as $categorie)
          <option value={{$categorie->id}} {{ ( isset($sous_categorie) && $sous_categorie->categorie->id == $categorie->id) ? "selected" : null }}>{{$categorie->nom}}</option>
          
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="" value="{{ $sous_categorie->nom ?? '' }}">
    </div>
    <button type="submit" class="btn btn-primary me-2">Enregister</button>
    <button class="btn btn-secondary" onclick="event.preventDefault(); history.back()">Annuler</button>
</form>