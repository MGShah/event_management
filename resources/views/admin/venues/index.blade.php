@extends('layouts.admin')

@section('title','Events - Admin')

@section('content')
 <div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
   <h3 class="mb-0">Venues</h3>
   <a href="{{ route('admin.venues.create') }}" class="btn btn-primary">Add Venue</a>
  </div>

  <div class="card shadow-sm">
   <div class="table-responsive">
    <table class="table table-striped mb-0">
     <thead>
      <tr>
       <th>#</th>
       <th>Name</th>
       <th>City</th>
       <th>Capacity</th>
       <th class="text-end">Actions</th>
      </tr>
     </thead>
     <tbody>
      @forelse($venues as $v)
       <tr>
        <td>{{ $v->id }}</td>
        <td>{{ $v->name }}</td>
        <td>{{ $v->city ?? '—' }}</td>
        <td>{{ $v->capacity }}</td>
        <td class="text-end">
         <a href="{{ route('admin.venues.show', $v) }}" class="btn btn-sm btn-outline-secondary">View</a>
         <a href="{{ route('admin.venues.edit', $v) }}" class="btn btn-sm btn-outline-dark">Edit</a>
         <form action="{{ route('admin.venues.destroy', $v) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this venue?')">
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-outline-danger">Delete</button>
         </form>
        </td>
       </tr>
      @empty
       <tr>
        <td colspan="5" class="text-center py-4 text-muted">No venues found</td>
       </tr>
      @endforelse
     </tbody>
    </table>
   </div>
   <div class="card-footer">{{ $venues->links() }}</div>
  </div>
 </div>
@endsection
