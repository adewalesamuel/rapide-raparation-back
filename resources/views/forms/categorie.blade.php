<form class="forms-sample" action="/admin/categories{{ isset($categorie) ? '/' . $categorie->id : '' }}" method="POST">
    @csrf
    @method($method ?? "POST")
    <div class="form-group">
      <label for="nom_prenoms">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="" value="{{ $categorie->nom ?? '' }}">
    </div>
    <button type="submit" class="btn btn-primary me-2">Enregister</button>
    <button class="btn btn-secondary" onclick="event.preventDefault(); history.back()">Annuler</button>
</form>