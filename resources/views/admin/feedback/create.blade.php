@extends('layouts.admin')

@section('title','Events - Admin')

@section('content')
 <div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
   <h3 class="mb-0">Add Feedback</h3>
   <a href="{{ route('admin.feedback.index') }}" class="btn btn-outline-dark">Back</a>
  </div>

  <div class="card shadow-sm">
   <div class="card-body">
    <form method="POST" action="{{ route('admin.feedback.store') }}">
     @csrf
     <div class="row g-3">
      <div class="col-md-6">
       <label class="form-label">User</label>
       <select name="user_id" class="form-select" required>
        <option value="">Select user</option>
        @foreach($users as $u)
          <option value="{{ $u->id }}" {{ old('user_id') == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
        @endforeach
       </select>
       @error('user_id')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-6">
       <label class="form-label">Event (optional)</label>
       <select name="event_id" class="form-select">
        <option value="">—</option>
        @foreach($events as $e)
          <option value="{{ $e->id }}" {{ old('event_id') == $e->id ? 'selected' : '' }}>{{ $e->title }}</option>
        @endforeach
       </select>
       @error('event_id')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
     </div>

     <div class="row g-3 mt-1">
      <div class="col-md-4">
       <label class="form-label">Rating (1-5)</label>
       <input type="number" name="rating" class="form-control" min="1" max="5" value="{{ old('rating') }}">
       @error('rating')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-8">
       <label class="form-label">Comment</label>
       <textarea name="comment" class="form-control" rows="3">{{ old('comment') }}</textarea>
       @error('comment')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
     </div>

     <div class="d-flex gap-2 mt-4">
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="{{ route('admin.feedback.index') }}" class="btn btn-outline-secondary">Cancel</a>
     </div>
    </form>
   </div>
  </div>
 </div>
@endsection
