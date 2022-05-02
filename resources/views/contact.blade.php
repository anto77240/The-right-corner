@extends('layoutindex')

@section('contenu')

<form method="post" class="section" >
{{ csrf_field() }}

<!-- //Email// -->
    <div class="field">
        <label class="label">E-mail</label>
        <div class="control">
            <input class="input " type="email" name="email">
        </div>
    </div>


<!-- //Nom// -->
    <div class="field">
        <label class="label">Nom</label>
        <div class="control">
            <input class="input" type="name" name="name">
        </div>
    </div>

<!-- //Téléphone// -->
    <div class="field">
        <label class="label">Téléphone</label>
        <div class="control">
            <input class="input" type="tel" name="phone_number">
        </div>
    </div>


<!-- //Message// -->
    <div class="field">
        <label class="label">Message</label>
        <div class="control">
            <textarea class="textarea" type="message" name="message" rows="6"></textarea>
        </div>
    </div>

<!-- //Submit// -->
    <div class="field">
        <div class="control">
            <button class="button is-link" type="submit">Envoyer</button>
        </div>
    </div>
</form>

@endsection