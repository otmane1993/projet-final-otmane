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
        @if(Session::has('message-hotel'))
        <p>{{Session::get('message-hotel')}}</p>
        @endif
        @if(Session::has('update-hotel'))
        <p>{{Session::get('update-hotel')}}</p>
        @endif
    </div>
</div>
@endsection
