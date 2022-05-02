
@extends('layout')

@section('contenu')

<h1 class="title">Editer catégorie :</h1>

<form class="section" action="/categories_edit/{{ $categories -> id }}" method="post">
    @method('PUT')
    {{ csrf_field() }}


    <div class="field">
        <label class="label">Votre catégorie : </label>
        <div class="control">
          <input class="input" type="text" name="name" value="{{ $categories->name }}">
        </div>
        @if($errors->has('name'))
          <p class="help is-danger">{{ $errors->first('name')}}</p>
        @endif
      </div>
      <h4><input class="buttonsubmit" type="submit" name="submit" value="Modifier l'annonce" style="background-color:#6667ab;font-family: 'Nunito', sans-serif;"></h4>
</form>


  @endsection
