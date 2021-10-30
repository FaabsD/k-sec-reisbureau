@extends('layouts.main')
@section('page_title')
    Hotel inter
@endsection
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
    <div class="grid grid-cols-3 gap-x-4 container mx-auto">
        @foreach( $data['hotelRooms'] as $room )
            <div class="px-4 py-2 rounded bg-gray-100">
                <h2>{{ $room['room_name'] }}</h2>
                <p>
                    {{ $room['location'] }} <br>
                    {{ $room['price'] }} <br>
                </p>
                <p>
                    {{ $room['details'] }}
                </p>
            </div>
        @endforeach
    </div>
@endsection
