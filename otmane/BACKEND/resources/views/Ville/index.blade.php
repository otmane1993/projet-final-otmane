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
    <div class="table-hotel py-4">
        <a href="{{route('ville.create')}}" class="btn btn-success add">Ajouter Ville:</a>
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
                    <td>{{$ville->name_ville}}</td>
                    <td>
                        <a class="btn btn-danger delete-ville" onclick="let x=confirm('Do you really want to delete this city?');if(x){this.setAttribute('href','{{route('ville.delete',$ville->id)}}');}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$villes->links()}}
        @if(Session::has('message-ville'))
        <p>{{Session::get('message-ville')}}</p>
        @endif
    </div>
</div>
@endsection