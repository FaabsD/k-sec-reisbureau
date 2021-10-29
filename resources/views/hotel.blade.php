@extends('layouts.main')
@section('header')
    <header class="w-full">
        <div>
            <h2 class="text-2xl">
                Hotel rooms
            </h2>
        </div>

    </header>
@endsection

@section('content')
    <div>
        @foreach($data['hotelRooms'] as $room)
            <div>
                <h2>{{ $room['room_name'] }}</h2>
                <p>
                    {{ $room['location'] }}
                </p>
            </div>
        @endforeach
    </div>
@endsection
