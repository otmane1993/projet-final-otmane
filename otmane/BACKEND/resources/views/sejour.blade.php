@extends('layouts.app')

@section('content')
<div>
    <ul>
        <li>
            <a href="{{Route('hotel')}}" class="hotel">Hotels</a>
        </li>
        <li>
            <a href="{{route('ville')}}" class="ville">Villes</a>
        </li>
        <li>
            <a href="{{route('sejour')}}" class="sejour">Sejours</a>
        </li>
    </ul>
</div>
@endsection
