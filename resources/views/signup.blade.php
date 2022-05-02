@extends('layout')

@section('contenu')

<form method="post" class="section" >
{{ csrf_field() }}

<!-- //Email// -->
<div class="field">
  <label class="label">E-mail</label>
  <div class="control">
    <input class="input " type="email" name="email" value="{{ old('email') }}" >
  </div>
  @if($errors->has('email'))
    <p class="help is-danger">{{ $errors->first('email')}}</p>
  @endif
</div>


<!-- //Mot de passe// -->
<div class="field">
  <label class="label">Mot de passe</label>
  <div class="control">
    <input class="input" type="password" name="password">
  </div>
  @if($errors->has('password'))
    <p class="help is-danger">{{ $errors->first('password')}}</p>
  @endif
</div>

<!-- //Mot de passe : confirmation// -->
<div class="field">
  <label class="label">Mot de passe : confirmation</label>
  <div class="control">
    <input class="input" type="password" name="password_confirmation">
  </div>
  @if($errors->has('password_confirmation'))
    <p class="help is-danger">{{ $errors->first('password_confirmation')}}</p>
  @endif
</div>


<!-- //Phone number// -->
<div class="field">
  <label class="label">N° de tél</label>
  <div class="control">
    <input class="input" type="tel" name="phone_number">
  </div>
</div>


<!-- //Nickname// -->
<div class="field">
  <label class="label">Pseudo</label>
  <div class="control">
    <input class="input" type="text" name="nickname">
  </div>
</div>


<!-- //Submit// -->
<div class="field">
  <div class="control">
    <button class="button is-link" type="submit">M'inscrire</button>
  </div>
</div>
</form>

@endsection