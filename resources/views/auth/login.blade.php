<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body { height: 100%; }
    body { margin: 0; overflow: hidden; }
    .bg-img { position: fixed; inset: 0; z-index: 0; background: url('{{ asset('storage/images/auth2.jpg') }}') center/cover no-repeat; }
    .bg-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.35); z-index: 0; }
    .auth-container { position: relative; z-index: 1; min-height: 100%; display: flex; align-items: center; justify-content: center; padding: 24px; }
    .auth-card { width: 100%; max-width: 420px; backdrop-filter: blur(8px); background: rgba(255,255,255,0.88); border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.25); }
    .brand { position: absolute; top: 24px; left: 50%; transform: translateX(-50%); color: #fff; text-shadow: 0 2px 12px rgba(0,0,0,0.4); font-weight: 700; letter-spacing: .5px; }
  </style>
</head>
<body>
  <div class="bg-img"></div>
  <div class="bg-overlay"></div>
  <div class="auth-container">
    <h1 class="brand display-6">Perfect Events</h1>
    <div class="auth-card p-4 p-md-5 border">
      <h2 class="mb-3 text-center">Welcome back</h2>
      <form method="POST" action="{{ route('login.post') }}" class="vstack gap-3">
        @csrf
        <div>
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
        </div>
        <div>
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
        <div class="text-center small text-muted mt-2">Don't have an account? <a href="{{ route('register') }}">Register</a></div>
      </form>
    </div>
  </div>
</body>
</html>
