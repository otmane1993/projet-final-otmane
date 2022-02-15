@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <ul class="sidebar">
            <img width="100" height="100" src="{{Storage::url('b5.png')}}"/>
        <li>
            <a href="{{route('hotel')}}" class="hotel"><i class="fa-solid fa-hotel"></i>Hotels</a>
        </li>
        <li>
            <a href="{{route('ville')}}" class="ville"><i class="fa-solid fa-city"></i>Villes</a>
        </li>
        <li>
            <a href="{{route('sejour')}}" class="sejour"><i class="fa-solid fa-calendar-day"></i>Sejours</a>
        </li>
    </ul>
    <div class="show-hotel py-4">
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