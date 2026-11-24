<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::with(['user','event'])->latest()->paginate(10);
        return view('admin.feedback.index', compact('feedback'));
    }

    public function create()
    {
        $users = User::select('id','name')->get();
        $events = Event::select('id','title')->get();
        return view('admin.feedback.create', compact('users','events'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'nullable|exists:events,id',
            'rating' => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);
        $item = Feedback::create($data);
        return redirect()->route('admin.feedback.show', $item);
    }

    public function show(Feedback $feedback)
    {
        $feedback->load(['user','event']);
        return view('admin.feedback.show', compact('feedback'));
    }
}
