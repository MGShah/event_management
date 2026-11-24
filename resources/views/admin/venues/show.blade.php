@extends('layouts.admin')

@section('title','Events - Admin')

@section('content')
 <div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
   <h3 class="mb-0">Venue #{{ $venue->id }}</h3>
   <a href="{{ route('admin.venues.index') }}" class="btn btn-outline-dark">Back</a>
  </div>

  <div class="card shadow-sm">
   <div class="card-body">
    <dl class="row mb-0">
     <dt class="col-sm-3">Name</dt>
     <dd class="col-sm-9">{{ $venue->name }}</dd>

     <dt class="col-sm-3">City</dt>
     <dd class="col-sm-9">{{ $venue->city ?? '—' }}</dd>

     <dt class="col-sm-3">Capacity</dt>
     <dd class="col-sm-9">{{ $venue->capacity }}</dd>

     <dt class="col-sm-3">Address</dt>
     <dd class="col-sm-9">{{ $venue->address ?? '—' }}</dd>
    </dl>
   </div>
  </div>
 </div>
@endsection
