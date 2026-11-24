@extends('layouts.admin')

@section('title','Events - Admin')

@section('content')
 <div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
   <h3 class="mb-0">Payments</h3>
   <a href="{{ route('admin.payments.create') }}" class="btn btn-primary">Add Payment</a>
  </div>

  <div class="card shadow-sm">
   <div class="table-responsive">
    <table class="table table-striped mb-0">
     <thead>
      <tr>
       <th>#</th>
       <th>User</th>
       <th>Event</th>
       <th>Amount</th>
       <th>Status</th>
       <th>Paid At</th>
       <th class="text-end">Actions</th>
      </tr>
     </thead>
     <tbody>
      @forelse($payments as $p)
       <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->user->name ?? '—' }}</td>
        <td>{{ $p->event->title ?? ('#'.($p->event->id ?? '—')) }}</td>
        <td>{{ number_format($p->amount, 2) }}</td>
        <td><span class="badge text-bg-secondary">{{ ucfirst($p->status) }}</span></td>
        <td>{{ optional($p->paid_at)->format('d M Y, H:i') ?? '—' }}</td>
        <td class="text-end">
         <a href="{{ route('admin.payments.show', $p) }}" class="btn btn-sm btn-outline-secondary">View</a>
        </td>
       </tr>
      @empty
       <tr>
        <td colspan="7" class="text-center py-4 text-muted">No payments found</td>
       </tr>
      @endforelse
     </tbody>
    </table>
   </div>
   <div class="card-footer">{{ $payments->links() }}</div>
  </div>
 </div>
@endsection
