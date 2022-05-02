@extends('layoutindex')

@section ('contenu')

  <p class="title" style="font-weight: bold; font-size: 40px;"><strong>{{ $products->title}}</strong></p>
  
  <p>
    <figure class="image" style="width:50%">
      <img src="/storage/{{$products->picture}}">
    </figure>
  </p>
  <p><br></p>
  <p class="subtitle" style="font-size: 28px;"><strong>{{ $products->price}} €</strong></p>
  <p>{{$products->description}}</p><br>
  <p style="font-size: 12px;">{{$products->location}}</p>
  <small style="font-size: 10px;">{{ Carbon\Carbon::parse($products->created_at)->diffForHumans() }}</small>
  <div class="sc-iIHjhz bBRLFI">
    <div class="sc-isBZXS iSQsnJ">
      <div class="sc-jHZirH jlzvQA">
        <a href="/contact"><button class="_2qvLx _3WXWV _35pAC _1Vw3w _kC3e _32ILh _2L9kx _30q3D _1y_ge _3QJkO" data-pub-id="adview_button_contact_contact" category_id="22" type="button">Contact</button></a>
      </div>
    </div>
  </div>

@endsection