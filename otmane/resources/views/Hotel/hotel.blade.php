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
    <div class="table-hotel">
        <a href="{{route('hotel.create')}}" class="btn btn-success">Ajouter Hotel:</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Numero:</th>
                    <th>Nom:</th>
                    <th>Image:</th>
                    <th>Actions:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel)
                <tr>
                    <td>{{$hotel->id}}</td>
                    <td>{{$hotel->name_hotel}}</td>
                    <td>
                        <img width="100" height="100" src="{{Storage::url($hotel->image_hotel)}}">
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{route('')}}">Update</a>
                        <a class="btn btn-primary" href="">Show</a>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(Session::has('message'))
        <p>{{Session::get('message')}}</p>
        @endif
    </div>
</div>
@endsection
