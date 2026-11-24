@extends('layouts.admin')

@section('title','Event Details - Admin')

@section('content')
 <div class="flex items-center justify-between mb-4">
  <h3 class="text-xl font-semibold">Event: {{ $event->title }}</h3>
  <div class="flex items-center gap-2">
   <a href="{{ route('admin.events.edit', $event) }}" class="px-4 py-2 rounded-md text-sm font-semibold border border-neutral-300 text-neutral-800 hover:bg-neutral-100">Edit</a>
   <a href="{{ route('admin.events.index') }}" class="px-4 py-2 rounded-md text-sm font-semibold border border-neutral-300 text-neutral-800 hover:bg-neutral-100">Back</a>
  </div>
 </div>

 <div class="bg-white rounded-xl border border-neutral-200 shadow-sm p-6">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
   <div>
    <div class="text-neutral-500">Title</div>
    <div class="font-medium">{{ $event->title }}</div>
   </div>
   <div>
    <div class="text-neutral-500">Date</div>
    <div class="font-medium">{{ $event->date }}</div>
   </div>
   <div>
    <div class="text-neutral-500">Venue</div>
    <div class="font-medium">{{ $event->venue ?? '—' }}</div>
   </div>
   <div>
    <div class="text-neutral-500">Status</div>
    <div><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-neutral-100 text-neutral-800">{{ ucfirst($event->status) }}</span></div>
   </div>
   <div class="md:col-span-2">
    <div class="text-neutral-500">Description</div>
    <div class="font-medium">{{ $event->description ?? '—' }}</div>
   </div>
  </div>
 </div>
@endsection
