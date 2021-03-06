@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <ul class="sidebar">
            <img width="150" height="150" src="{{Storage::url('public/files/Logo-agencia.png')}}"/>
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
    <div class="create-hotel py-4">
        <form method="POST" enctype="multipart/form-data" action="{{route('sejour.store')}}">
            @csrf
            <div class="form-group">
                <label for="depart">Date de depart:</label>
                <input type="date" class="form-control @error('depart') is-invalid @enderror" id="depart" name="depart">
                @error('depart')
                <p class="par-error">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="arrive">Date d'arrive:</label>
                <input type="date" class="form-control @error('arrive') is-invalid @enderror" id="arrive" name="arrive">
                @error('arrive')
                <p class="par-error">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="hotel">Choisissez l'hotel:</label>
                <select name="hotel" class="form-control">
                    @foreach($hotels as $hotel)
                    <option value="{{$hotel->id}}">{{$hotel->name_hotel}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="ville">Choisissez la ville:</label>
                <select name="ville" class="form-control">
                    @foreach($villes as $ville)
                    <option value="{{$ville->id}}">{{$ville->name_ville}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="create" class="btn btn-success">
            </div>        
        </form>
        <a href="{{route('sejour')}}" class="btn btn-primary">Retour</a>
    </div>
</div>
@endsection