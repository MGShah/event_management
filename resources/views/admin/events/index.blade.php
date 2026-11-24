@extends('layouts.admin')

@section('title','Events - Admin')

@section('content')
 <div class="flex items-center justify-between mb-4">
  <h3 class="text-xl font-semibold">Events</h3>
  <a href="{{ route('admin.events.create') }}" class="px-4 py-2 rounded-md text-sm font-semibold border border-neutral-300 text-neutral-800 hover:bg-neutral-100">Create Event</a>
 </div>

 <div class="bg-white rounded-xl border border-neutral-200 shadow-sm overflow-hidden">
  <div class="overflow-x-auto">
   <table class="min-w-full text-sm">
    <thead class="bg-neutral-50 text-neutral-700">
     <tr>
      <th class="text-left px-4 py-3 font-semibold">#</th>
      <th class="text-left px-4 py-3 font-semibold">Title</th>
      <th class="text-left px-4 py-3 font-semibold">Date</th>
      <th class="text-left px-4 py-3 font-semibold">Venue</th>
      <th class="text-left px-4 py-3 font-semibold">Status</th>
      <th class="text-right px-4 py-3 font-semibold">Actions</th>
     </tr>
    </thead>
    <tbody class="divide-y divide-neutral-100">
     @forelse($events as $event)
     <tr>
      <td class="px-4 py-3">{{ $event->id }}</td>
      <td class="px-4 py-3">{{ $event->title }}</td>
      <td class="px-4 py-3">{{ $event->date }}</td>
      <td class="px-4 py-3">{{ $event->venue }}</td>
      <td class="px-4 py-3"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-neutral-100 text-neutral-800">{{ ucfirst($event->status) }}</span></td>
      <td class="px-4 py-3 text-right">
       <a href="{{ route('admin.events.show', $event) }}" class="px-3 py-1.5 rounded border border-neutral-300 text-neutral-800 hover:bg-neutral-100">View</a>
       <a href="{{ route('admin.events.edit', $event) }}" class="px-3 py-1.5 rounded border border-neutral-300 text-neutral-800 hover:bg-neutral-100">Edit</a>
       <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline" onsubmit="return confirm('Delete this event?')">
        @csrf
        @method('DELETE')
        <button class="px-3 py-1.5 rounded border border-red-300 text-red-700 hover:bg-red-50">Delete</button>
       </form>
      </td>
     </tr>
     @empty
     <tr>
      <td colspan="6" class="px-4 py-6 text-center text-neutral-500">No events found</td>
     </tr>
     @endforelse
    </tbody>
   </table>
  </div>
  <div class="px-4 py-3 border-t">{{ $events->links() }}</div>
 </div>
@endsection
