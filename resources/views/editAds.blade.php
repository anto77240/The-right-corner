@extends('layoutindex')

@section('contenu')

<form method="post" class="section" enctype="multipart/form-data">
@method('PUT')

{{ csrf_field() }}


<!-- //Title// -->
<div class="field">
  <label class="label">Titre</label>
  <div class="control">
    <input class="input" type="text" name="title" value="{{$products->title}}">
  </div>
  @if($errors->has('title'))
    <p class="help is-danger">{{ $errors->first('title')}}</p>
  @endif
</div>

<!-- //Category// -->
<label class="label">Catégorie</label>
<div class="select" value="{{$products->category}}">
  <select name="category">
    <option value="Véhicules">Véhicules</option>
    <option value="Immobilier">Immobilier</option>
    <option value="Mode">Mode</option>
    <option value="Maison">Maison</option>
    <option value="Multimédia">Multimédia</option>
    <option value="Divers">Divers</option>
  </select>
</div>
<p><br/></p>
<!-- //Description// -->
<label class="label">Description</label>
<textarea name="description" class="textarea" rows="10">{{$products->description}}</textarea>

<!-- //Picture// -->
<div class="field">
  <label class="label">Image</label>
  <div class="control">
    <input class="input" type="file" name="picture" value="{{$products->picture}}">
  </div>
  @if($errors->has('picture'))
    <p class="help is-danger">{{ $errors->first('picture')}}</p>
  @endif
</div>

<!-- //Price// -->
<div class="field">
  <label class="label">Prix</label>
  <div class="control">
    <input class="input" type="text" name="price" value="{{$products->price}}">
  </div>
  @if($errors->has('price'))
    <p class="help is-danger">{{ $errors->first('price')}}</p>
  @endif
</div>

<!-- //Location// -->
<div class="field">
  <label class="label">Location</label>
  <div class="control">
    <input class="input" type="text" name="location" value="{{$products->location}}">
  </div>
  @if($errors->has('location'))
    <p class="help is-danger">{{ $errors->first('location')}}</p>
  @endif
</div>


<!-- //Submit// -->
<div class="field">
  <div class="control">
    <button class="button is-link" type="submit" style="background-color:#6667ab;font-family: 'Nunito', sans-serif;">Modifier l'annonce</button>
  </div>
</div>
</form>


@endsection
