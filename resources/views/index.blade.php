@extends('layoutindex')

@section('contenu')

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <form method="POST" action="/">
         {{ csrf_field() }}

            <div class="form-group">

                <div class="field is-grouped">
                    <p class="control is-expanded">
                        <input name="search" class="input" type="text" placeholder="Rechercher">
                    </p>
                    <!-- //Filtre catégorie// -->
                    <div class="select">
                         <select name="category">
                            <option>Filtrer par catégorie</option>
                          @foreach($category as $cat)
                            <option value="{{$cat->category_id}}">{{$cat->name}}</option>
                          @endforeach
                         </select>
                    </div>


                </div>
                <p class="control">
                    <!-- <a type="submit" name="submit" class="search-button">Rechercher</a><br /><br /> -->
                    <input value="Rechercher" type="submit" name="submit" class="button" style="background: #6667ab; color: white; font-weight: bold;">

                </p>



            </div>
         </form>



@foreach($products as $product)
   <div class="card mb-5" style="width: 100%; background-color: rgba(255, 255, 255, 0.4); margin-top: 30px;">
      <img class="card-img-top" style="width: 40%; padding-top: 15px;" src="storage/{{$product->picture}}">
      <div class="card-body">
         <h5 class="card-title"style="font-size: 28px;"><strong>{{ $product->title }}</strong></h5>
         <p class="card-text text-info">{{ $product->name }}</p>
         <p class="card-text"><strong>{{ $product->price }} €</strong></p>
         <small>{{ Carbon\Carbon::parse($product->created_at)->diffForHumans() }}</small><br>
         <a href="/viewAds/{{ $product->id }}" class="button" style="font-weight: bold;margin-bottom: 15px;">Voir l'annonce</a>
      </div>
   </div>
@endforeach
<small style="font-weight: bold;"{{ $products->links() }}</small>

      </div>
   </div>   
</div>

@endsection