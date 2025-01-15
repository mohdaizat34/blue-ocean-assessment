@extends('layouts.app')

@section('title', 'Select Coach')

@section('content')

<h2 class="text-xl font-semibold dark:text-white text-center " style="margin-top: 32px; margin-bottom: 32px;">Select Coach for Train {{ $train->train_name }}</h2>

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-center items-center">
        <table class="min-w-full table-auto border-collapse bg-gray-800 text-gray-100 dark:bg-gray-900 dark:text-gray-200 rounded-lg overflow-hidden shadow-lg">
            <thead>
                <tr class="bg-gray-700">
                    <th class="px-6 py-3 text-left text-white font-medium">Coach Name</th>
                    <th class="px-6 py-3 text-left text-white font-medium">Seat Capacity</th>
                    <th class="px-6 py-3 text-left text-white font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coaches as $coach)
                    <tr class="bg-gray-700 text-gray-100 hover:bg-gray-600 transition-colors">
                        <td class="px-6 py-3 text-left">{{ $coach->coach_name }}</td>
                        <td class="px-6 py-3 text-left">{{ $coach->seat_capacity }}</td>
                        <td class="px-6 py-3 text-left">
                            <a href="{{ route('select-seat', ['train_id' => $train->id, 'coach_id' => $coach->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full" style="text-decoration: underline;">
                                Select Coach
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
