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
    <div class="edit-hotel py-4">
        <form method="POST" action="{{route('sejour.update',$sejour->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ville">Nom de la ville:</label>
                <select name="ville" class="form-control">
                    @foreach($villes as $ville)
                    @if($ville->id==$sejour->ville_id)
                    <option value="{{$ville->id}}" selected>{{$ville->name_ville}}</option>
                    @else
                    <option value="{{$ville->id}}">{{$ville->name_ville}}</option>
                    @endif
                    @endforeach
                </select>
                @error('ville')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="hotel">Nom de l'hotel:</label>
                <select name="hotel" class="form-control">
                    @foreach($hotels as $hotel)
                    @if($hotel->id==$sejour->hotel_id)
                    <option value="{{$hotel->id}}" selected>{{$hotel->name_hotel}}</option>
                    @else
                    <option value="{{$hotel->id}}">{{$hotel->name_hotel}}</option>
                    @endif
                    @endforeach
                </select>
                @error('hotel')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="date-depart">Date de depart:</label>
                <input type="date" class="form-control" name="date_depart" id="date_depart" value="{{$sejour->date_depart}}">
                @error('date-depart')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="date-arrive">Date d'arrive:</label>
                <input type="date" class="form-control" name="date_arrive" id="date_arrive" value="{{$sejour->date_arrive}}">
                @error('date-arrive')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" class="form-group" value="update">
            </div>
        </form>
        <a class="btn btn-success" href="{{route('sejour')}}">Retour</a>
    </div>
</div>
@endsection