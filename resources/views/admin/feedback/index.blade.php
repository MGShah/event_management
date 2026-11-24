@extends('layouts.admin')

@section('title','Events - Admin')

@section('content')
 <div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
   <h3 class="mb-0">Feedback</h3>
   <a href="{{ route('admin.feedback.create') }}" class="btn btn-primary">Add Feedback</a>
  </div>

  <div class="card shadow-sm">
   <div class="table-responsive">
    <table class="table table-striped mb-0">
     <thead>
      <tr>
       <th>#</th>
       <th>User</th>
       <th>Event</th>
       <th>Rating</th>
       <th>Comment</th>
       <th class="text-end">Actions</th>
      </tr>
     </thead>
     <tbody>
      @forelse($feedback as $f)
       <tr>
        <td>{{ $f->id }}</td>
        <td>{{ $f->user->name ?? '—' }}</td>
        <td>{{ $f->event->title ?? '—' }}</td>
        <td>{{ $f->rating ?? '—' }}</td>
        <td>{{ \Illuminate\Support\Str::limit($f->comment, 60) }}</td>
        <td class="text-end">
         <a href="{{ route('admin.feedback.show', $f) }}" class="btn btn-sm btn-outline-secondary">View</a>
        </td>
       </tr>
      @empty
       <tr>
        <td colspan="6" class="text-center py-4 text-muted">No feedback found</td>
       </tr>
      @endforelse
     </tbody>
    </table>
   </div>
   <div class="card-footer">{{ $feedback->links() }}</div>
  </div>
 </div>
@endsection
