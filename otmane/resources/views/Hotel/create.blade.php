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
        <form method="POST" action="{{route('hotel.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nom de l'hotel:</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Prix de l'hotel:</label>
                <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror">
                @error('price')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Telecharger l'image:</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="create" class="btn btn-success">
            </div>        
        </form>
        <a href="{{route('hotel')}}" class="btn btn-primary">Retour</a>
    </div>
</div>
@endsection