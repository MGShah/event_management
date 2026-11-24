<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root { --brand:#a8652a; --ink:#1f2937; }
    body{font-family:'Inter',system-ui,-apple-system,Segoe UI,Roboto,'Helvetica Neue',Arial,'Noto Sans',sans-serif; color:var(--ink)}
    .brand{color:var(--brand)}
    .btn-brand{background:var(--brand);} .btn-brand:hover{background:#8d5423}
    html{ scroll-behavior:smooth; }
  </style>
 </head>
 <body class="bg-gradient-to-b from-neutral-50 to-white">
  <div aria-hidden="true" class="pointer-events-none fixed inset-0 -z-10 bg-[radial-gradient(40%_40%_at_70%_0%,rgba(168,101,42,0.08),transparent_60%)]"></div>

  <div class="max-w-7xl mx-auto px-6 py-10">
    <header class="flex items-center justify-between mb-8">
      <div class="flex items-center gap-4">
        <h1 class="text-3xl font-bold tracking-tight">Admin <span class="brand">Dashboard</span></h1>
        <a href="{{ route('homepage') }}" class="text-sm font-medium text-neutral-700 border border-neutral-300 px-3 py-2 rounded hover:bg-neutral-100">Go to Site</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="px-4 py-2 rounded-md text-sm font-semibold border border-neutral-300 text-neutral-700 hover:bg-neutral-100">Logout</button>
        </form>
      </div>
    </header>

    <nav class="mb-8 border-b border-neutral-200">
      <ul class="flex items-center gap-4 text-sm py-2">
        <li><a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded hover:bg-neutral-100">Dashboard</a></li>
        <li><a href="{{ route('admin.events.index') }}" class="px-3 py-2 rounded hover:bg-neutral-100">Events</a></li>
        <li><a href="{{ route('admin.users.index') }}" class="px-3 py-2 rounded hover:bg-neutral-100">Users</a></li>
        
        <li><a href="{{ route('admin.payments.index') }}" class="px-3 py-2 rounded hover:bg-neutral-100">Payments</a></li>
        <li><a href="{{ route('admin.venues.index') }}" class="px-3 py-2 rounded hover:bg-neutral-100">Venues</a></li>
        <li><a href="#" class="px-3 py-2 rounded hover:bg-neutral-100">Vendors</a></li>
        <li><a href="{{ route('admin.feedback.index') }}" class="px-3 py-2 rounded hover:bg-neutral-100">Feedback</a></li>
      </ul>
    </nav>

    @if(session('success'))
      <div class="mb-6 text-sm bg-green-50 text-green-800 border border-green-200 px-4 py-3 rounded">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="mb-6 text-sm bg-red-50 text-red-800 border border-red-200 px-4 py-3 rounded">{{ session('error') }}</div>
    @endif

    @php
      try { $usersCount = \App\Models\User::count(); } catch (\Throwable $e) { $usersCount = 0; }
      try { $eventsCount = \App\Models\Event::count(); } catch (\Throwable $e) { $eventsCount = 0; }
      try { $paymentsCount = \App\Models\Payment::count(); } catch (\Throwable $e) { $paymentsCount = 0; }
    @endphp

    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
      <div class="bg-white rounded-xl border border-neutral-200 p-6 shadow-sm">
        <p class="text-sm text-neutral-500">Total Users</p>
        <p class="mt-2 text-3xl font-semibold">{{ (int)$usersCount }}</p>
      </div>
      <div class="bg-white rounded-xl border border-neutral-200 p-6 shadow-sm">
        <p class="text-sm text-neutral-500">Total Events</p>
        <p class="mt-2 text-3xl font-semibold">{{ (int)$eventsCount }}</p>
      </div>
      <div class="bg-white rounded-xl border border-neutral-200 p-6 shadow-sm">
        <p class="text-sm text-neutral-500">Total Payments</p>
        <p class="mt-2 text-3xl font-semibold">{{ (int)$paymentsCount }}</p>
      </div>
    </section>

    <section id="events" class="bg-white rounded-xl border border-neutral-200 shadow-sm">
      <div class="p-6 border-b border-neutral-200 flex items-center justify-between">
        <h2 class="text-lg font-semibold">Recent Events</h2>
        <a href="{{ route('admin.events.index') }}" class="text-sm px-3 py-2 rounded border border-neutral-300 hover:bg-neutral-100">All Events</a>
       </div>
      <div class="p-6 overflow-x-auto">
        @php
          try {
            $recentEvents = \App\Models\Event::latest()->limit(5)->get();
          } catch (\Throwable $e) { $recentEvents = collect(); }
        @endphp
        <table class="min-w-full text-sm">
          <thead class="bg-neutral-50 text-neutral-700">
            <tr>
              <th class="text-left px-4 py-3 font-semibold">ID</th>
              <th class="text-left px-4 py-3 font-semibold">Title</th>
              <th class="text-left px-4 py-3 font-semibold">Date</th>
              <th class="text-left px-4 py-3 font-semibold">Venue</th>
              <th class="text-left px-4 py-3 font-semibold">Status</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-neutral-100">
            @forelse($recentEvents as $ev)
              <tr>
                <td class="px-4 py-3 font-medium text-neutral-800">{{ (int)$ev->id }}</td>
                <td class="px-4 py-3 text-neutral-700">{{ $ev->title }}</td>
                <td class="px-4 py-3 text-neutral-700">{{ $ev->date }}</td>
                <td class="px-4 py-3 text-neutral-700">{{ $ev->venue ?? '—' }}</td>
                <td class="px-4 py-3"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-neutral-100 text-neutral-800">{{ ucfirst($ev->status ?? 'draft') }}</span></td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="px-4 py-6 text-center text-neutral-500">No events found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </section>
  </div>
 </body>
 </html>
