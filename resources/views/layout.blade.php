<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TheRightCorner</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

<!-- Styles -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <!-- <link rel="stylesheet" href="../css/styles.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="./resources/css/styles.css"> -->
  <link rel="stylesheet" href="<?php echo asset('css/styles.css')?>" type="text/css">

  <script src="https://kit.fontawesome.com/e4d1bafa7c.js" crossorigin="anonymous"></script>


<style>

* {

}

body {
    font-family: 'Nunito', sans-serif;
    height: 100vh;
    background: #dcd6d1;
        
}

.navbar {
    box-shadow: 0px 0px 10px black;
    background-color: #aea393;
      
}

/* @media screen and(max-width: 700px) {
    .navbar {
        display: none;
        width: auto;
        text-align: left;
    }
    .navbar-start {
        flex-direction: column;
    }
} */

a.button {
    padding: 10px 30px;
    background: #6667ab;
    color: white;
    margin-top: 20px;
    margin-left: 10px;
    border: none;
}

@media (max-width: 1023px) {
    a.button {
    margin-top: 5px;
}
}

a.button:hover {
    background: #dcd6d1;
    color: #6667ab;
}

.navbar-item:hover {
    background-color: #dcd6d1 !important;
}

.container {
    padding-right: 80px;
    padding-left: 80px;
    margin-right: auto;
    margin-left: auto;
}

@media (min-width: 1200px){
    .container {
        width: 1170px;
    }
}

[class="card-body"] {
    margin-right: auto;
    margin-left: auto;
    
}

footer {
    margin-top: 15px;
    padding-right: 110px;
    padding-left: 110px;
    margin-right: auto;
    margin-left: auto;
}

</style>
</head>
<body>
  <nav class="navbar">
    <div class="navbar-brand">

        
@if(auth()->check() AND auth()->user()->admin != 1)
<a href="/depot-annonce" type="button" class="button" style="font-weight: bold;">Déposer une annonce</a>
@endif

@if(auth()->check() AND auth()->user()->admin == 1)
        <a href="/admin" type="button" class="button" style="font-weight: bold;">ADMIN {{ Auth::user()->nickname }}</a>
        <a href="/deconnexion" class="navbar-item">Déconnexion</a>

      
            @elseif(auth()->check() AND auth()->user()->admin != 1)
          
            <a href="/mesannonces" class="navbar-item">Mes annonces</a>
            <a href="/mon-compte" class="navbar-item" style="font-weight: bold;" {{ request()->is('mon-compte') ? 'is-active' : '' }}">{{ Auth::user()->nickname }}</a>       
            <a href="/deconnexion" class="navbar-item">Déconnexion</a>
                         
            @else
            <a href="/sign_up" class="navbar-item {{ request()->is('sign_up') ? 'is-active' : '' }}">Inscription</a>
            <a href="/login" class="navbar-item {{ request()->is('login') ? 'is-active' : '' }}">Se connecter</a>
            
            @endif

</div>
      <div class="navbar-menu navbar-end" style="font-weight: bold;">
      <a href="/" class="navbar-item" style="color: #6667ab; font-size: 40px; font-weight: bold; background: none !important;">Therightcorner</a>

            
        





      </div>
  </nav>
<div class="section">
  @include('flash::message')
  @yield('contenu')

</div>
  
</body>
</html>