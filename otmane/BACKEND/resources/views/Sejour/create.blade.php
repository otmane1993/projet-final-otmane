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
    <div class="create-hotel py-4">
        <form method="POST" enctype="multipart/form-data" action="{{route('sejour.store')}}">
            @csrf
            <div class="form-group">
                <label for="depart">Date de depart:</label>
                <input type="date" class="form-control @error('depart') is-invalid @enderror" id="depart" name="depart">
                @error('depart')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="arrive">Date d'arrive:</label>
                <input type="date" class="form-control @error('arrive') is-invalid @enderror" id="arrive" name="arrive">
                @error('arrive')
                <p>{{$message}}</p>
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