@extends('layouts.admin')

@section('title','Users - Admin')

@section('content')
 <div class="flex items-center justify-between mb-4">
  <h3 class="text-xl font-semibold">Users</h3>
  <a href="{{ route('admin.users.create') }}" class="px-3 py-1.5 rounded bg-blue-600 text-white hover:bg-blue-700">Add User</a>
 </div>

 <div class="bg-white rounded-xl border border-neutral-200 shadow-sm overflow-hidden">
  <div class="overflow-x-auto">
   <table class="min-w-full text-sm">
    <thead class="bg-neutral-50 text-neutral-700">
     <tr>
      <th class="text-left px-4 py-3 font-semibold">#</th>
      <th class="text-left px-4 py-3 font-semibold">Name</th>
      <th class="text-left px-4 py-3 font-semibold">Email</th>
      <th class="text-left px-4 py-3 font-semibold">Role</th>
      <th class="text-right px-4 py-3 font-semibold">Actions</th>
     </tr>
    </thead>
    <tbody class="divide-y divide-neutral-100">
     @forelse($users as $user)
     <tr>
      <td class="px-4 py-3">{{ $user->id }}</td>
      <td class="px-4 py-3">{{ $user->name }}</td>
      <td class="px-4 py-3">{{ $user->email }}</td>
      <td class="px-4 py-3">
       @php
        $role = method_exists($user, 'getRoleNames') ? $user->getRoleNames()->first() : ($user->role ?? null);
       @endphp
       {{ $role ?? '—' }}
      </td>
      <td class="px-4 py-3 text-right">
       <a href="{{ route('admin.users.show', $user) }}" class="px-3 py-1.5 rounded border border-neutral-300 text-neutral-800 hover:bg-neutral-100">View</a>
       <a href="{{ route('admin.users.edit', $user) }}" class="px-3 py-1.5 rounded border border-neutral-300 text-neutral-800 hover:bg-neutral-100">Edit</a>
       <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Delete this user?')">
        @csrf
        @method('DELETE')
        <button class="px-3 py-1.5 rounded border border-red-300 text-red-700 hover:bg-red-50">Delete</button>
       </form>
      </td>
     </tr>
     @empty
     <tr>
      <td colspan="5" class="px-4 py-6 text-center text-neutral-500">No users found</td>
     </tr>
     @endforelse
    </tbody>
   </table>
  </div>
  <div class="px-4 py-3 border-t">{{ $users->links() }}</div>
 </div>
@endsection
