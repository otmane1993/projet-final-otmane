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
        <a href="{{route('hotel.create')}}" class="btn btn-success add">Ajouter Hotel:</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Numero:</th>
                    <th>Nom:</th>
                    <th>Price:</th>
                    <th>Image:</th>
                    <th>Actions:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel)
                <tr>
                    <td>{{$hotel->id}}</td>
                    <td>{{$hotel->name_hotel}}</td>
                    <td>{{$hotel->price}}</td>
                    <!--<td>{{$hotel->image_hotel}}</td>-->
                    <td>
                        <img width="100" height="100" src="{{Storage::url($hotel->image_hotel)}}">
                        <!--<img src="{{ asset('storage/images/GHeZVWFtZZcaVxU5TDqqy3Sj4BOsOiMFPwFp52hF.png') }}" alt="">-->
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{route('hotel.edit',$hotel->id)}}">Edit</a>
                        <a class="btn btn-primary" href="{{route('hotel.show',$hotel->id)}}">Show</a>
                        <a class="btn btn-danger delete-hotel" onclick="let x=confirm('Do you really want to delete this hotel?');if(x){this.setAttribute('href','{{route('hotel.delete',$hotel->id)}}');}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$hotels->links()}}
        @if(Session::has('message-hotel'))
        <p class="message-session">{{Session::get('message-hotel')}}</p>
        @endif
        @if(Session::has('update-hotel'))
        <p class="message-session">{{Session::get('update-hotel')}}</p>
        @endif
    </div>
</div>
@endsection
