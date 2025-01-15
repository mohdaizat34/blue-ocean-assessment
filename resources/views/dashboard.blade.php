<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <h1 style="margin-top:2%; margin-bottom:2%"> Train Booking System </h1>

                        <form method="POST" action="{{ route('search-trains') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div>
                                <label for="origin" class="block text-sm font-medium mb-1">Origin</label>
                                <input type="text" id="origin" name="origin"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-white text-black focus:outline-none focus:ring focus:ring-indigo-500"
                                    placeholder="Enter origin" required>
                            </div>
                            <div>
                                <label for="destination" class="block text-sm font-medium mb-1">Destination</label>
                                <input type="text" id="destination" name="destination"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-white text-black focus:outline-none focus:ring focus:ring-indigo-500"
                                    placeholder="Enter destination" required>
                            </div>
                            <div>
                                <label for="departure_date" class="block text-sm font-medium mb-1">Departure Date</label>
                                <input type="date" id="departure_date" name="departure_date"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-white text-black focus:outline-none focus:ring focus:ring-indigo-500"
                                    required>
                            </div>
                            <div>
                                <label for="return_date" class="block text-sm font-medium mb-1">Return Date</label>
                                <input type="date" id="return_date" name="return_date"
                                    class="w-full px-4 py-2 rounded-lg border border-black-600 bg-white text-black focus:outline-none focus:ring focus:ring-indigo-500">
                            </div>
                        </div>
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="pax" class="block text-sm font-medium mb-1">Number of Passengers</label>
                                <input type="number" id="pax" name="pax" min="1"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-white text-black focus:outline-none focus:ring focus:ring-indigo-500"
                                    placeholder="Enter number of passengers" required>
                            </div>
                            <div class="flex items-end">
                                <button  type="submit"
                                        class="bg-white hover:bg-blue-700 text-black font-bold py-2 px-4 rounded-full">
                                    Search Trains
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>


