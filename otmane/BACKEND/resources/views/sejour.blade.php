@extends('layouts.app')

@section('content')
<div>
    <ul>
        <li>
            <a href="{{Route('hotel')}}">Hotels</a>
        </li>
        <li>
            <a href="{{route('ville')}}">Villes</a>
        </li>
        <li>
            <a href="{{route('sejour')}}">Sejours</a>
        </li>
    </ul>
</div>
@endsection