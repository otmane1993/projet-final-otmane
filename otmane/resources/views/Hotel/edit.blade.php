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
    <div class="edit-hotel">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nom de l'hotel:</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$hotel->price}}">
                @error('name')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Prix de l'hotel:</label>
                <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$hotel->price}}">
                @error('price')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Nouvelle Image:</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" class="form-group" value="update">
            </div>
        </form>
        <a class="btn btn-success" href="{{route('hotel')}}">Retour</a>
    </div>
</div>
@endsection