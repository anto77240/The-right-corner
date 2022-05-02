@extends('layout')

@section ('contenu')
    <h1 class="title">Les categories :</h1>
 
    <div>
      <a href="/categories_add">
      <button class="button is-link" type="submit" style="background-color:#6667ab;font-family: 'Nunito', sans-serif;">Ajouter </button>
      </a>
      <p><br/></p>
    </div>
  
    <table class="table">
      
        <thead>
         
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
     
        @foreach($categories as $categorie)

       
        <tr>
                <td scope="row">{{$categorie->id }}
                </td>
                <td>{{$categorie->name}}</td>
                <td><a href="/categories_edit/{{ $categorie -> id }}" ><i class="fa-solid fa-marker"></i></a></td>
                <td><a href="/categories_destroy/{{ $categorie -> id }}"><i class="fa-solid fa-trash-can"></i></a></td>
            
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