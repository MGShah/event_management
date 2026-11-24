@extends('layouts.admin')

@section('title','Events - Admin')

@section('content')
 <div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
   <h3 class="mb-0">Bookings</h3>
   <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">Add Booking</a>
  </div>

  <div class="card shadow-sm">
   <div class="card-body p-0">
    <div class="table-responsive">
     <table class="table table-striped mb-0">
      <thead>
       <tr>
        <th>#</th>
        <th>User</th>
        <th>Event</th>
        <th>Qty</th>
        <th>Amount</th>
        <th>Status</th>
        <th class="text-end">Actions</th>
       </tr>
      </thead>
      <tbody>
       @forelse($bookings as $booking)
        <tr>
         <td>{{ $booking->id }}</td>
         <td>{{ $booking->user->name ?? '—' }}</td>
         <td>{{ $booking->event->title ?? '—' }}</td>
         <td>{{ $booking->qty }}</td>
         <td>{{ number_format($booking->amount, 2) }}</td>
         <td><span class="badge text-bg-secondary">{{ ucfirst($booking->status) }}</span></td>
         <td class="text-end">
          <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-sm btn-outline-secondary">View</a>
          <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-sm btn-outline-dark">Edit</a>
          <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this booking?')">
           @csrf
           @method('DELETE')
           <button class="btn btn-sm btn-outline-danger">Delete</button>
          </form>
         </td>
        </tr>
       @empty
        <tr>
         <td colspan="7" class="text-center py-4 text-muted">No bookings found</td>
        </tr>
       @endforelse
      </tbody>
     </table>
    </div>
   </div>
   <div class="card-footer">{{ $bookings->links() }}</div>
  </div>
 </div>
@endsection
