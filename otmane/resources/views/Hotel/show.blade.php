@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <ul>
        <li>
            <a href="{{route('hotel')}}">Hotels</a>
        </li>
        <li>
            <a href="{{route('ville')}}">Villes</a>
        </li>
        <li>
            <a href="{{route('sejour')}}">Sejours</a>
        </li>
    </ul>
    <div class="show-hotel">
        <h2>Nom de l'hotel:</h2>
        <p>{{$hotel->name_hotel}}</p>
        <h2>Prix de l'hotel:</h2>
        <p>{{$hotel->price}}</p>
        <h2>L'image de l'hotel:</h2>
        <img height="200" width="200" src="{{Storage::url($hotel->image_hotel)}}">
        <a class="btn btn-success" href="{{route('hotel')}}" style="display:block;">Retour</a>
    </div>
</div>
@endsection