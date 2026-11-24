<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['user','event'])->latest()->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        $users = User::select('id','name')->get();
        $events = Event::select('id','title')->latest()->get();
        return view('admin.payments.create', compact('users','events'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,paid,failed,refunded',
            'method' => 'nullable|string|max:100',
        ]);
        if (($data['status'] ?? null) === 'paid') {
            $data['paid_at'] = now();
        }
        $payment = Payment::create($data);
        return redirect()->route('admin.payments.show', $payment);
    }

    public function show(Payment $payment)
    {
        $payment->load(['user','event']);
        return view('admin.payments.show', compact('payment'));
    }
}

