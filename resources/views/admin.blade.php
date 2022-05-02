@extends('layout')

@section('contenu')

<table>


<h1 class="title" >Ma page d'administration :</h1><br>




<div>
  <a href="/utilisateurs">
  <button class="button is-link" type="submit" style="background-color:#6667ab;font-family: 'Nunito', sans-serif;">
    Les utilisateurs </button>
  </a>
  <p><br/></p>
</div>


<div>
  <a href="/admin_ads">
  <button class="button is-link" type="submit" style="background-color:#6667ab;font-family: 'Nunito', sans-serif;">
    Les produits </button>
  </a>
  <p><br/></p>
</div>



<div>
  <a href="/admin_categories">
  <button class="button is-link" type="submit" style="background-color:#6667ab;font-family: 'Nunito', sans-serif;">
    Les categories </button>
  </a>
  <p><br/></p>
</div>


</table>

@endsection
