@extends('layouts.app')

@section('title', 'Select Seat')

@section('content')
<head>
    <meta http-equiv="refresh" content="2">
</head>
<h2 class="text-xl font-semibold dark:text-white text-center" style="margin-top: 32px; margin-bottom: 32px;">Select Seat for Coach {{ $coach->name }}</h2>

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-center items-center">
        <table class="min-w-full table-auto border-collapse bg-gray-800 text-gray-100 dark:bg-gray-900 dark:text-gray-200 rounded-lg overflow-hidden shadow-lg">
            <thead>
                <tr class="bg-gray-700">
                    <th class="px-6 py-3 text-left text-white font-medium">Seat Number</th>
                    <th class="px-6 py-3 text-left text-white font-medium">Status</th>
                    <th class="px-6 py-3 text-left text-white font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($seats as $seat)
                    <tr class="bg-gray-700 text-gray-100 hover:bg-gray-600 transition-colors">
                        <td class="px-6 py-3 text-left">{{ $seat->seat_number }}</td>
                        <td class="px-6 py-3 text-left">{{ $seat->is_available ? 'Available' : 'Locked' }}</td>
                        <td class="px-6 py-3 text-left">
                            @if($seat->is_available)
                                <a href="{{ route('booking-summary', ['train_id' => $train->id, 'coach_id' => $coach->id, 'seat_id' => $seat->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" style="text-decoration: underline;">
                                    Book Seat
                                </a>
                            @else

                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
