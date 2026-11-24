@extends('layouts.admin')

@section('title','Create Event - Admin')

@section('content')
 <div class="flex items-center justify-between mb-4">
  <h3 class="text-xl font-semibold">Create Event</h3>
  <a href="{{ route('admin.events.index') }}" class="px-4 py-2 rounded-md text-sm font-semibold border border-neutral-300 text-neutral-800 hover:bg-neutral-100">Back</a>
 </div>

 <div class="bg-white rounded-xl border border-neutral-200 shadow-sm p-6">
  <form method="POST" action="{{ route('admin.events.store') }}" class="space-y-4">
   @csrf
   <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
     <label class="block text-sm font-medium mb-1">Title</label>
     <input type="text" name="title" value="{{ old('title') }}" required class="w-full rounded-md border border-neutral-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-neutral-300">
     @error('title')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
    </div>
    <div>
     <label class="block text-sm font-medium mb-1">Date & Time</label>
     <input type="datetime-local" name="date" value="{{ old('date') }}" required class="w-full rounded-md border border-neutral-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-neutral-300">
     @error('date')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
    </div>
    <div>
     <label class="block text-sm font-medium mb-1">Venue</label>
     <input type="text" name="venue" value="{{ old('venue') }}" class="w-full rounded-md border border-neutral-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-neutral-300">
     @error('venue')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
    </div>
    <div>
     <label class="block text-sm font-medium mb-1">Status</label>
     <select name="status" required class="w-full rounded-md border border-neutral-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-neutral-300">
      <option value="draft" @selected(old('status')==='draft')>Draft</option>
      <option value="published" @selected(old('status')==='published')>Published</option>
      <option value="cancelled" @selected(old('status')==='cancelled')>Cancelled</option>
     </select>
     @error('status')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
    </div>
   </div>
   <div>
    <label class="block text-sm font-medium mb-1">Description</label>
    <textarea name="description" rows="5" class="w-full rounded-md border border-neutral-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-neutral-300">{{ old('description') }}</textarea>
    @error('description')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
   </div>
   <div>
    <button class="px-4 py-2 rounded-md text-sm font-semibold border border-neutral-300 text-neutral-800 hover:bg-neutral-100">Save</button>
   </div>
  </form>
 </div>
@endsection
