@extends('layouts.admin')

@section('title','Events - Admin')

@section('content')
 <div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
   <h3 class="mb-0">Payment #{{ $payment->id }}</h3>
   <a href="{{ route('admin.payments.index') }}" class="btn btn-outline-dark">Back</a>
  </div>

  <div class="card shadow-sm">
   <div class="card-body">
    <dl class="row mb-0">
     <dt class="col-sm-3">User</dt>
     <dd class="col-sm-9">{{ $payment->user->name ?? '—' }}</dd>

     <dt class="col-sm-3">Event</dt>
     <dd class="col-sm-9">{{ $payment->event->title ?? ('#'.($payment->event->id ?? '—')) }}</dd>

     <dt class="col-sm-3">Amount</dt>
     <dd class="col-sm-9">{{ number_format($payment->amount, 2) }}</dd>

     <dt class="col-sm-3">Status</dt>
     <dd class="col-sm-9"><span class="badge text-bg-secondary">{{ ucfirst($payment->status) }}</span></dd>

     <dt class="col-sm-3">Method</dt>
     <dd class="col-sm-9">{{ $payment->method ?? '—' }}</dd>

     <dt class="col-sm-3">Paid At</dt>
     <dd class="col-sm-9">{{ optional($payment->paid_at)->format('d M Y, H:i') ?? '—' }}</dd>
    </dl>
   </div>
  </div>
 </div>
@endsection
