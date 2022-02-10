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
    <div class="create-ville">
        <form method="POST" enctype="multipart/form-data" action="{{route('ville.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Nom de la ville:</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" value="create" class="btn btn-success">
            </div>        
        </form>
        <a href="{{route('ville')}}" class="btn btn-primary">Retour</a>
    </div>
</div>
@endsection