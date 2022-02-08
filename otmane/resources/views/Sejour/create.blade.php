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
    <div class="create-hotel">
        <form method="POST" enctype="multipart/form-data" action="{{route('sejour.store')}}">
            @csrf
            <div class="form-group">
                <label for="depart">Date de depart:</label>
                <input type="date" class="form-control" id="depart" name="depart">
                @error('depart')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="arrive">Date d'arrive:</label>
                <input type="date" class="form-control" id="arrive" name="arrive">
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
        <a href="{{route('hotel')}}" class="btn btn-primary">Retour</a>
    </div>
</div>
@endsection