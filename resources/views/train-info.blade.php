@extends('layouts.app')

@section('title', 'Available Trains')

@section('content')

<h2 class="text-xl font-semibold  dark:text-white text-center" style="margin-top: 32px; margin-bottom: 32px;">Available Trains</h2><br><br>

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-center items-center">
        <table class="min-w-full table-auto border-collapse bg-gray-800 text-gray-100 dark:bg-gray-900 dark:text-gray-200 rounded-lg overflow-hidden shadow-lg">
            <thead>
                <tr class="bg-gray-700">
                    <th class="px-6 py-3 text-left text-white font-medium">Train Name</th>
                    <th class="px-6 py-3 text-left text-white font-medium">Origin</th>
                    <th class="px-6 py-3 text-left text-white font-medium">Destination</th>
                    <th class="px-6 py-3 text-left text-white font-medium">Departure Time</th>
                    <th class="px-6 py-3 text-left text-white font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($trains->isEmpty())
                    <tr>
                        <td colspan="5" class="px-6 py-3 text-center text-red-500 font-semibold">
                            No trains found matching your search criteria.
                        </td>
                    </tr>
                @else
                    @foreach($trains as $train)
                        <tr class="bg-gray-700 text-gray-100 hover:bg-gray-600 transition-colors">
                            <td class="px-6 py-3 text-left">{{ $train->train_name }}</td>
                            <td class="px-6 py-3 text-left">{{ $train->origin }}</td>
                            <td class="px-6 py-3 text-left">{{ $train->destination }}</td>
                            <td class="px-6 py-3 text-left">{{ $train->departure_time->format('Y-m-d H:i') }}</td>
                            <td class="px-6 py-3 text-left">
                                <a href="{{ route('select-coach', ['train_id' => $train->id, 'coach_id' => 1]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full" style="text-decoration: underline;">
                                    Select Coach
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
