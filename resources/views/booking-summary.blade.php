@extends('layouts.app')

@section('title', 'Booking Summary')

@section('content')

<h2 class="text-xl font-semibold dark:text-white text-center " style="margin-top: 32px; margin-bottom: 32px;">Booking Summary</h2>

<div class="container mx-auto px-4 py-8 justify-center text-center">
    <div class="bg-gray-800 text-gray-100 dark:bg-gray-900 dark:text-gray-200 rounded-lg overflow-hidden shadow-lg p-6">
        <h5 class="text-lg font-semibold mb-4">Train Information</h5>
        <ul class="space-y-2">
            <li><strong>Train Name:</strong> {{ $train->train_name }}</li>
            <li><strong>Origin:</strong> {{ $train->origin }}</li>
            <li><strong>Destination:</strong> {{ $train->destination }}</li>
            <li><strong>Departure Time:</strong> {{ $train->departure_time->format('Y-m-d H:i') }}</li>
        </ul>

        <h5 class="text-lg font-semibold mt-6 mb-4">Coach Information</h5>
        <ul class="space-y-2">
            <li><strong>Coach Name:</strong> {{ $coach->coach_name }}</li>
            <li><strong>Seat Capacity:</strong> {{ $coach->seat_capacity }}</li>
        </ul>

        <h5 class="text-lg font-semibold mt-6 mb-4">Seat Information</h5>
        <ul class="space-y-2">
            <li><strong>Seat Number:</strong> {{ $seat->seat_number }}</li>
            <li><strong>Status:</strong> {{ $seat->is_available ? 'Available' : 'NOT AVAILABLE FOR BOOKING' }}</li>
        </ul>
        <br><br>
        <div class="mt-8 text-center">
            <!-- Add a form that submits a POST request to confirm the booking -->
            <form action="{{ route('confirm-seat', ['train_id' => $train->id, 'coach_id' => $coach->id, 'seat_id' => $seat->id]) }}" method="POST">
                @csrf
                @if ($seat->is_available)
                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full ml-4">
                        Confirm Booking
                    </button>
                @else

                @endif
            </form>
            <br>
            <a href="{{ route('select-seat', ['train_id' => $train->id, 'coach_id' => $coach->id]) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full ml-4">
                Go Back to Seat Selection
            </a>
        </div>
    </div>
</div>

@endsection
