@extends('layouts.admin')

@section('title','Events - Admin')

@section('content')
 <div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
   <h3 class="mb-0">Add Venue</h3>
   <a href="{{ route('admin.venues.index') }}" class="btn btn-outline-dark">Back</a>
  </div>

  <div class="card shadow-sm">
   <div class="card-body">
    <form method="POST" action="{{ route('admin.venues.store') }}">
     @csrf
     <div class="row g-3">
      <div class="col-md-6">
       <label class="form-label">Name</label>
       <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
       @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-6">
       <label class="form-label">City</label>
       <input type="text" name="city" class="form-control" value="{{ old('city') }}">
       @error('city')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
     </div>

     <div class="row g-3 mt-1">
      <div class="col-md-8">
       <label class="form-label">Address</label>
       <input type="text" name="address" class="form-control" value="{{ old('address') }}">
       @error('address')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-4">
       <label class="form-label">Capacity</label>
       <input type="number" name="capacity" class="form-control" value="{{ old('capacity', 0) }}" min="0">
       @error('capacity')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
     </div>

     <div class="d-flex gap-2 mt-4">
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="{{ route('admin.venues.index') }}" class="btn btn-outline-secondary">Cancel</a>
     </div>
    </form>
   </div>
  </div>
 </div>
@endsection
