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
    <div class="table-sejour py-4">
        <a href="{{route('sejour.create')}}" class="btn btn-success add">Ajouter Sejour:</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Numero:</th>
                    <th>date depart:</th>
                    <th>date arrive:</th>
                    <th>Hotel:</th>
                    <th>Ville:</th>
                    <th>Actions:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sejours as $sejour)
                <tr>
                    <td>{{$sejour->id}}</td>
                    <td>{{$sejour->date_depart}}</td>
                    <td>{{$sejour->date_arrive}}</td>
                    @foreach($hotels as $hotel)
                    @if($sejour->hotel_id==$hotel->id)
                    <td>{{$hotel->name_hotel}}</td>
                    @endif
                    @endforeach
                    @foreach($villes as $ville)
                    @if($sejour->ville_id==$ville->id)
                    <td>{{$ville->name_ville}}</td>
                    @endif
                    @endforeach
                    <td>
                        <a class="btn btn-success" href="{{route('sejour.edit',$sejour->id)}}">Edit</a>
                        <a class="btn btn-primary" href="{{route('sejour.show',$sejour->id)}}">Show</a>
                        <a class="btn btn-danger delete-sejour" onclick="let x=confirm('Do you really want to delete this sejour?');if(x){this.setAttribute('href','{{route('sejour.delete',$sejour->id)}}');}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$sejours->links()}}
        @if(Session::has('message-sejour'))
        <p>{{Session::get('message-sejour')}}</p>
        @endif
        @if(Session::has('update-sejour'))
        <p>{{Session::get('update-sejour')}}</p>
        @endif
    </div>
</div>
@endsection
