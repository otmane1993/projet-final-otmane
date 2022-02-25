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
    <div class="create-ville py-4">
        <form method="POST" enctype="multipart/form-data" action="{{route('ville.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Nom de la ville:</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <p class="par-error">{{$message}}</p>
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