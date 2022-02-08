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
        <a href="{{route('ville.create')}}" class="btn btn-success">Ajouter Ville:</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Numero:</th>
                    <th>Nom:</th>
                    <th>Actions:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($villes as $ville)
                <tr>
                    <td>{{$ville->id}}</td>
                    <td>{{$hotel->name_ville}}</td>
                    <td>
                        <a class="btn btn-danger delete-ville" onclick="let x=confirm('Do you really want to delete this city?');if(x){this.setAttribute('href','{{route('ville.delete',$ville->id)}}');}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(Session::has('message'))
        <p>{{Session::get('message')}}</p>
        @endif
        @if(Session::has('update'))
        <p>{{Session::get('update')}}</p>
        @endif
    </div>
</div>
@endsection