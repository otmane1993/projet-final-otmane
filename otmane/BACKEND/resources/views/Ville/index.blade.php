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
        <p class="message-session">{{Session::get('message-ville')}}</p>
        @endif
    </div>
</div>
@endsection