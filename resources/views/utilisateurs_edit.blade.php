
@extends('layout')

@section('contenu')

<h1 class="title">Editer utilisateur :</h1>

<form class="section" action="/utilisateurs_edit/{{ $utilisateurs -> id }}" method="post">
    @method('PUT')
    {{ csrf_field() }}



<h4> Your nickname</h4>
        <input type="hidden" value="{{ $utilisateurs->id }}" name="id" id="">
        <input  type="text" value="{{ $utilisateurs->nickname }}" name="nickname" >

<h4>Your email:</h4>
    <input  type="text" value="{{ $utilisateurs->email }}" name="email" >
<h4>Your phone number:</h4>
    <input  type="text" value="{{ $utilisateurs->phone_number }}" name="phone_number" ><br/>
    <label style="color:#3a829c"><br/><b>Admin </b></label>
        <input type="checkbox" name="admin" value=1>
<h4><input class="buttonsubmit" type="submit" name="submit" value="Mettre à jour" style="background-color:#6667ab;font-family: 'Nunito', sans-serif;"></h4>

</form>


   
  @endsection