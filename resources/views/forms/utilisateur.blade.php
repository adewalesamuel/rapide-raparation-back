<form class="forms-sample" action="/admin/utilisateurs{{ isset($utilisateur) ? '/' . $utilisateur->id : '' }}" method="POST">
    @csrf
    @method($method ?? "POST")
    <div class="form-group">
      <label for="nom_prenoms">Nom et Prénom(s)</label>
      <input type="text" class="form-control" id="nom_prenoms" name="nom_prenoms" placeholder="" value="{{ $utilisateur->nom_prenoms ?? '' }}">
    </div>
    <div class="form-group">
      <label for="mail">Addresse mail</label>
      <input type="email" class="form-control" id="mail"  name="mail" placeholder="" value={{ $utilisateur->mail ?? "" }}>
    </div>
    <div class="form-group">
      <label for="telephone">N° de téléphone</label>
      <input type="tel" class="form-control" id="telephone"  name="telephone" placeholder="" value="{{ $utilisateur->telephone ?? '' }}">
    </div>
    <div class="form-group">
        <label for="date_naissance">Date de naissance</label>
        <input type="date" class="form-control" id="date_naissance"  name="date_naissance" placeholder="" value="{{ $utilisateur->date_naissance ?? '' }}">
    </div>
    <div class="form-group">
        <label for="type">Type de compte</label>
        <select class="form-control" name="type" id="type">
            @foreach ($types as $type)
            <option value={{$type}} {{ ( isset($utilisateur) && $utilisateur->type == $type) ? "selected" : null }}>{{$type}}</option>
            
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nom_entreprise">Nom de l'entreprise</label>
        <input type="text" class="form-control" id="nom_entreprise"  name="nom_entreprise" placeholder="" value="{{ $utilisateur->nom_entreprise ?? '' }}">
    </div>
    <div class="form-group">
        <label for="registre_commerce">Registre du commerce</label>
        <input type="text" class="form-control" id="registre_commerce"  name="registre_commerce" placeholder="" value="{{ $utilisateur->registre_commerce ?? '' }}">
    </div>
    <div class="form-group">
        <label for="dfe">DFE</label>
        <input type="text" class="form-control" id="dfe"  name="dfe" placeholder="" value="{{ $utilisateur->dfe ?? '' }}">
    </div>
    <div class="form-group">
        <label for="pc_code">PC CODE</label>
        <input type="text" class="form-control" id="pc_code"  name="pc_code" placeholder="" value="{{ $utilisateur->pc_code ?? '' }}">
    </div>
    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" class="form-control" id="password" name="password"  placeholder="" value="{{env('DEFAULT_PASSWORD') ?? ''}}">
    </div>
    <button type="submit" class="btn btn-primary me-2">Enregister</button>
    <button class="btn btn-secondary" onclick="event.preventDefault(); history.back()">Annuler</button>
</form>