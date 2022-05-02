<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <style>
    body {
    font-family: 'Nunito', sans-serif;
    background: #dcd6d1;        
    }

    .navbar {
    box-shadow: 0px 0px 10px black;
    background-color: #aea393;    
    }
  </style>
</head>
<body>
<nav class="navbar">
    <div class="navbar-menu">
      <div class="navbar-start">
        <a href="/" class="navbar-item" style="color: #6667ab; font-size: 40px; font-weight: bold; background: none !important;">Therightcorner</a>
      </div>
    </div>
</nav>
  <h1>Validation inscription</h1>
  <p>Bonjour {{$data['name']}},</p>

<p>Votre inscription a bien été prise en compte.</p>

<p>Cordialement</p>
<p>L'équipe The Right Corner</p>
</body>
</html>