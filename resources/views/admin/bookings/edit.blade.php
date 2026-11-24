@extends('layouts.admin')

@section('title','Events - Admin')

@section('content')
 <div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
   <h3 class="mb-0">Edit Booking #{{ $booking->id }}</h3>
   <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-dark">Back</a>
  </div>

  <div class="card shadow-sm">
   <div class="card-body">
    <form method="POST" action="{{ route('admin.bookings.update', $booking) }}">
     @csrf
     @method('PUT')
     <div class="row g-3">
      <div class="col-md-6">
       <label class="form-label">User</label>
       <select name="user_id" class="form-select" required>
        @foreach($users as $u)
          <option value="{{ $u->id }}" {{ old('user_id', $booking->user_id) == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
        @endforeach
       </select>
       @error('user_id')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-6">
       <label class="form-label">Event</label>
       <select name="event_id" class="form-select" required>
        @foreach($events as $e)
          <option value="{{ $e->id }}" {{ old('event_id', $booking->event_id) == $e->id ? 'selected' : '' }}>{{ $e->title }}</option>
        @endforeach
       </select>
       @error('event_id')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
     </div>

     <div class="row g-3 mt-1">
      <div class="col-md-4">
       <label class="form-label">Quantity</label>
       <input type="number" name="qty" min="1" class="form-control" value="{{ old('qty', $booking->qty) }}" required>
       @error('qty')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-4">
       <label class="form-label">Amount</label>
       <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $booking->amount) }}" required>
       @error('amount')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-4">
       <label class="form-label">Status</label>
       <select name="status" class="form-select" required>
        @foreach(['pending','confirmed','cancelled'] as $s)
          <option value="{{ $s }}" {{ old('status', $booking->status) === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
        @endforeach
       </select>
       @error('status')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
     </div>

     <div class="d-flex gap-2 mt-4">
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-outline-secondary">Cancel</a>
     </div>
    </form>
   </div>
  </div>
 </div>
@endsection
