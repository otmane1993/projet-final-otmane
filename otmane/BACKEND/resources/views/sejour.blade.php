@extends('layouts.app')

@section('content')
<div>
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
</div>
@endsection
