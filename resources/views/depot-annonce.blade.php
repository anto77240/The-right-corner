@extends('layoutindex')

@section('contenu')

<!-- title, category, description, picture(s), price, location -->

<form method="post" action="/depot-annonce" class="section" enctype="multipart/form-data">
{{ csrf_field() }}

<!-- //Title// -->
<div class="field">
  <label class="label">Titre</label>
  <div class="control">
    <input class="input" type="text" name="title">
  </div>
  @if($errors->has('title'))
    <p class="help is-danger">{{ $errors->first('title')}}</p>
  @endif
</div>



<!-- //Category// -->
<label class="label">Catégorie</label>
<div class="select">
  <select name="category">
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
  </select>
</div>
<p><br/></p>


<!-- //Description// -->
<label class="label">Description</label>
<textarea name="description" class="textarea" rows="10"></textarea>

<!-- //Picture// -->
<div class="field">
  <label class="label">Image</label>
  <div class="control">
    <input class="input" type="file" name="picture">
  </div>
  @if($errors->has('picture'))
    <p class="help is-danger">{{ $errors->first('picture')}}</p>
  @endif
</div>

<!-- //Price// -->
<div class="field">
  <label class="label">Prix</label>
  <div class="control">
    <input class="input" type="text" name="price">
  </div>
  @if($errors->has('price'))
    <p class="help is-danger">{{ $errors->first('price')}}</p>
  @endif
</div>

<!-- //Location// -->
<div class="field">
  <label class="label">Location</label>
  <div class="control">
    <input class="input" type="text" name="location">
  </div>
  @if($errors->has('location'))
    <p class="help is-danger">{{ $errors->first('location')}}</p>
  @endif
</div>


<!-- //Submit// -->
<div class="field">
  <div class="control">
    <input class="button is-link" type="submit" value="Déposer l'annonce">
  </div>
</div>
</form>

@endsection