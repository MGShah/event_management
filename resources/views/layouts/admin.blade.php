<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title','Admin Dashboard')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root { --brand:#a8652a; --ink:#1f2937; }
    body{font-family:'Inter',system-ui,-apple-system,Segoe UI,Roboto,'Helvetica Neue',Arial,'Noto Sans',sans-serif; color:var(--ink)}
    .brand{color:var(--brand)}
    .btn-brand{background:var(--brand);} .btn-brand:hover{background:#8d5423}
    html{ scroll-behavior:smooth; }
  </style>
  @stack('head')
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
        <li><a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded hover:bg-neutral-100 {{ request()->routeIs('admin.dashboard') ? 'bg-neutral-100 font-medium' : '' }}">Dashboard</a></li>
        <li><a href="{{ route('admin.events.index') }}" class="px-3 py-2 rounded hover:bg-neutral-100 {{ request()->is('admin/events*') ? 'bg-neutral-100 font-medium' : '' }}">Events</a></li>
        <li><a href="{{ route('admin.users.index') }}" class="px-3 py-2 rounded hover:bg-neutral-100 {{ request()->is('admin/users*') ? 'bg-neutral-100 font-medium' : '' }}">Users</a></li>
        <li><a href="{{ route('admin.payments.index') }}" class="px-3 py-2 rounded hover:bg-neutral-100 {{ request()->is('admin/payments*') ? 'bg-neutral-100 font-medium' : '' }}">Payments</a></li>
        <li><a href="{{ route('admin.venues.index') }}" class="px-3 py-2 rounded hover:bg-neutral-100 {{ request()->is('admin/venues*') ? 'bg-neutral-100 font-medium' : '' }}">Venues</a></li>
        <li><a href="{{ route('admin.feedback.index') }}" class="px-3 py-2 rounded hover:bg-neutral-100 {{ request()->is('admin/feedback*') ? 'bg-neutral-100 font-medium' : '' }}">Feedback</a></li>
      </ul>
    </nav>

    @if(session('success'))
      <div class="mb-6 text-sm bg-green-50 text-green-800 border border-green-200 px-4 py-3 rounded">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="mb-6 text-sm bg-red-50 text-red-800 border border-red-200 px-4 py-3 rounded">{{ session('error') }}</div>
    @endif

    @yield('content')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('body')
</body>
</html>
