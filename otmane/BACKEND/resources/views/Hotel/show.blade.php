@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <ul class="sidebar">
            <img width="100" height="100" src="{{Storage::url('public/files/Logo-agencia.png')}}"/>
        <li>
            <a href="{{route('hotel')}}" class="hotel"><i class="fa fa-hotel"></i>Hotels</a>
        </li>
        <li>
            <a href="{{route('ville')}}" class="ville"><i class="fa fa-city"></i>Villes</a>
        </li>
        <li>
            <a href="{{route('sejour')}}" class="sejour"><i class="fa fa-calendar-day"></i>Sejours</a>
        </li>
    </ul>
    <div class="show-hotel py-4">
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