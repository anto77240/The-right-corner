@extends('layout')

@section('contenu')
{{ csrf_field() }}
<h1 class="title">Mon compte :</h1><br/>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nickname</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Date d'inscription</th>

    </tr>
  </thead>
  <tbody>

    @foreach($utilisateurs as $utilisateur)

       
    <tr>
            <td scope="row">{{ $utilisateur->id }}
            </td>
            <td>{{ $utilisateur->nickname }}</td>
            <td>{{ $utilisateur->email }}</td>
            <td>{{ $utilisateur->phone_number }}</td>
            <td>{{ $utilisateur->created_at }}</td>

        
    </tr>   
    @endforeach

  </tbody>
</table>


<div>
  <a href="/mon-compte_destroy/{{ $utilisateur->id }}">
  <button class="button is-link" type="submit" style="background-color:#6667ab;font-family: 'Nunito', sans-serif;">
    Supprimer mon compte </button>
  </a>
  <p><br/></p>
</div>



@endsection

