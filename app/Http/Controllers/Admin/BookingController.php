<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user','event'])->latest()->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $users = User::select('id','name')->get();
        $events = Event::select('id','title')->get();
        return view('admin.bookings.create', compact('users','events'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'qty' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,confirmed,cancelled',
        ]);
        $data['booked_at'] = now();
        $booking = Booking::create($data);
        return redirect()->route('admin.bookings.show', $booking);
    }

    public function show(Booking $booking)
    {
        $booking->load(['user','event']);
        return view('admin.bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $users = User::select('id','name')->get();
        $events = Event::select('id','title')->get();
        return view('admin.bookings.edit', compact('booking','users','events'));
    }

    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'qty' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,confirmed,cancelled',
        ]);
        $booking->update($data);
        return redirect()->route('admin.bookings.show', $booking);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index');
    }
}
