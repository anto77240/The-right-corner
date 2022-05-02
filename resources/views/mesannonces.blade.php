@extends('layout')

@section('contenu')
<h1 class="title">Mes annonces :</h1><br/>


<!-- title, category, description, picture(s), price, location -->


<table class="table is-narrow is-hoverable">
<thead>
    <tr>
      <th>Photo</th>
      <th>Titre de l'annonce</th>
      <th>Categorie</th>
      <th>Prix</th>
      <th>Date de création</th>
      <th>Editer</th>
      <th>Supprimer</th>
    </tr>
</thead>
@foreach($products as $product)
<tr>
  <td>
  <figure class="image is-96x96">
      <img src="storage/{{$product->picture}}">
    </figure>
  </td>
  <td><strong>{{ $product->title}}</strong></td>
  <td>{{ $product->name}}</td>
  <td>{{ $product->price}} €</td>
  <td>{{ $product->created_at}}</td>
  <td>
    <a href="/editAds/{{$product->id}}">
      <i class="fa-solid fa-marker"></i>
    </a>
  </td>
  <td>
    <a href="/deleteAds/{{$product->id}}">
      <button class="delete"></button>
    </a>
  </td>
</tr>
@endforeach
</table>


@endsection