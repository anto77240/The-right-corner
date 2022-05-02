@extends('layout')

@section('contenu')


<form method="post" class="section" enctype="multipart/form-data">
{{ csrf_field() }}


<div class="field">

    <label class="label">Nom Categorie :</label>
    <div class="control">
      <input class="input" type="text" name="name" >
     @if($errors->has('name'))
      <p class="help is-danger">{{ $errors->first('name')}}</p>
    @endif
    </div>

  


<!-- //Submit// -->
<div class="field">
  <div class="control">
  </br>
    <button class="button is-link" type="submit" style="background-color:#6667ab;font-family: 'Nunito', sans-serif;">Ajouter une nouvelle catégorie</button>

  </div>
</div>



</form>

@endsection