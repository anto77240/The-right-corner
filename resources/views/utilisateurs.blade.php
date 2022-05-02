@extends('layout')

@section ('contenu')
    <h1 class="title">Les utilisateurs :</h1>


    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nickname</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Admin</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
     
        @foreach($utilisateurs as $utilisateur)

       
        <tr>
                <td scope="row">{{$utilisateur -> id }}
                </td>
                <td>{{$utilisateur -> nickname }}</td>
                <td>{{$utilisateur -> email }}</td>
                <td>{{$utilisateur -> phone_number }}</td>
                <td>{{$utilisateur -> admin }}</td>
                <td><a href="/utilisateurs_edit/{{ $utilisateur -> id }}" ><i class="fa-solid fa-marker"></i></a></td>
                <td><a href="/utilisateurs_destroy/{{ $utilisateur -> id }}"><i class="fa-solid fa-trash-can"></i></a></td>
            
        </tr>   
        @endforeach

        </tbody>
      </table>

      <div>
        <a href="/admin">
        <button class="button is-link" type="submit" style="background-color:#6667ab;font-family: 'Nunito', sans-serif;">
          Retour page d'administration </button>
        </a>
        <p><br/></p>
      </div>


@endsection

