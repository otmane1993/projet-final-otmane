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
        <h2>Nom de la ville:</h2>
        <p>{{$ville->name_ville}}</p>
        <h2>date de depart:</h2>
        <p>{{$sejour->date_depart}}</p>
        <h2>date d'arrive:</h2>
        <p>{{$sejour->date_arrive}}</p>
        <a class="btn btn-success" href="{{route('sejour')}}" style="display:block;">Retour</a>
    </div>
</div>
@endsection