<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>User Details - Admin</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
 <div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
   <h3 class="mb-0">User: {{ $user->name }}</h3>
   <div class="d-flex gap-2">
    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-outline-dark">Edit</a>
    <a href="{{ route('admin.users.index') }}" class="btn btn-dark">Back</a>
   </div>
  </div>

  <div class="card shadow-sm">
   <div class="card-body">
    <dl class="row mb-0">
     <dt class="col-sm-3">ID</dt>
     <dd class="col-sm-9">{{ $user->id }}</dd>

     <dt class="col-sm-3">Name</dt>
     <dd class="col-sm-9">{{ $user->name }}</dd>

     <dt class="col-sm-3">Email</dt>
     <dd class="col-sm-9">{{ $user->email }}</dd>

     <dt class="col-sm-3">Role</dt>
     <dd class="col-sm-9">
      @php
       $role = method_exists($user, 'getRoleNames') ? $user->getRoleNames()->first() : ($user->role ?? null);
      @endphp
      {{ $role ?? '—' }}
     </dd>

     <dt class="col-sm-3">Created</dt>
     <dd class="col-sm-9">{{ $user->created_at }}</dd>

     <dt class="col-sm-3">Updated</dt>
     <dd class="col-sm-9">{{ $user->updated_at }}</dd>
    </dl>
   </div>
  </div>
 </div>
</body>
</html>
