@extends('layouts.auth')
@section('content')
<div class="col-lg-4 mx-auto">
    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
      <div class="brand-logo">
        <img src="images/logo.png" alt="logo">
      </div>
      <h4>Bienvnue chez {{ env("APP_NAME") ?? ''}}</h4>
      <h6 class="fw-light">Connectez vous pour continuer</h6>
      @if (session("error"))
        <div class="alert alert-danger">
            {{session("error")}}
        </div>
      @endif
      <form class="pt-3" method="POST" action={{route('login')}}>
          @csrf
        <div class="form-group">
          <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Adresse mail" name="mail">
        </div>
        <div class="form-group">
          <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Mot de passe" name="password">
        </div>
        <div class="mt-3">
            <button type="submit" class="bbtn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                Se connecter
              </button>
        </div>
        <div class="my-2 d-flex justify-content-between align-items-center">
          <div class="form-check">
            <label class="form-check-label text-muted">
              <input type="checkbox" class="form-check-input">
              Se souvenir de moi
            </label>
          </div>
        </div>
        {{-- <div class="text-center mt-4 fw-light">
          Don't have an account? <a href="register.html" class="text-primary">Create</a>
        </div> --}}
      </form>
    </div>
  </div>
@endsection