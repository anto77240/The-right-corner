@extends('layout')

@section('contenu')
<form action="/login" method="post" class="section" style="justify-content:center;">
{{ csrf_field() }}

<!-- //Email// -->
<div class="field">
  <label class="label">E-mail</label>
  <div class="control">
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="email" name="email" value="{{ old('email') }}" >
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
</p>
  </div>
  @if($errors->has('email'))
    <p class="help is-danger">{{ $errors->first('email')}}</p>
  @endif
</div>


<!-- //Mot de passe// -->
<div class="field">
  <label class="label">Mot de passe</label>
  <div class="control">
  <p class="control has-icons-left">
    <input class="input" type="password" name="password">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
  </div>
  @if($errors->has('password'))
    <p class="help is-danger">{{ $errors->first('password')}}</p>
  @endif
</div>

<!-- //Submit// -->
<div class="field">
  <div class="control">
    <button class="button is-link" type="submit">Se connecter</button>
  </div>
</div>
</form>

@endsection