<?php

namespace App\Http\Controllers;

use App\Models\Train;
use App\Models\Coach;
use App\Models\Seat;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index()
    {
        $trains = Train::all();  // Fetch all trains from the database
        return view('train-info', compact('trains'));
    }

    public function search(Request $request)
    {
        // Validate the input data
        $request->validate([
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'departure_time' => 'nullable|date',
        ]);

        // Get the search input values
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $departure_time = $request->input('departure_time');

        // Query the database based on the search criteria
        $trains = Train::when($origin, function ($query, $origin) {
            return $query->where('origin', 'like', "%$origin%");
        })
        // ->when($destination, function ($query, $destination) {
        //     return $query->where('destination', 'like', "%$destination%");
        // })
        // ->when($departure_time, function ($query, $departure_time) {
        //     return $query->where('departure_time', '>=', $departure_time);
        // })
        ->get();

        // Return the results to a view
        return view('train-info', compact('trains'));
    }

    public function selectCoach($train_id)
    {
        $train = Train::findOrFail($train_id);
        $coaches = $train->coaches; // Assuming a train has many coaches
        return view('select-coach', compact('train', 'coaches'));
    }


    public function selectSeat($train_id, $coach_id)
    {
        $train = Train::findOrFail($train_id);
        $coach = Coach::findOrFail($coach_id);
        $seats = $coach->seats; // Assuming seats are related to coaches
        return view('select-seat', compact('train', 'coach', 'seats'));
    }


    public function showSummary($train_id, $coach_id, $seat_id)
    {
        $train = Train::findOrFail($train_id);
        $coach = Coach::findOrFail($coach_id);
        $seat = Seat::findOrFail($seat_id);

        // Pass the selected details to the view
        return view('booking-summary', compact('train', 'coach', 'seat'));
    }

    public function confirmSeat(Request $request, $train_id, $coach_id, $seat_id)
    {
        $seat = Seat::findOrFail($seat_id);
        if ($seat->is_available) {
            $seat->update(['is_available' => false]); // Mark seat as booked
            return redirect()->route('select-seat', ['train_id' => $train_id, 'coach_id' => $coach_id])
                             ->with('success', 'Seat booked successfully!');
        } else {
            return redirect()->route('select-seat', ['train_id' => $train_id, 'coach_id' => $coach_id])
                             ->with('error', 'Seat is already booked!');
        }
    }





}
