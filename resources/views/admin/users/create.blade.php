<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Create User - Admin</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
 <div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
   <h3 class="mb-0">Add User</h3>
   <a href="{{ route('admin.users.index') }}" class="btn btn-outline-dark">Back</a>
  </div>

  <div class="card shadow-sm">
   <div class="card-body">
    <form method="POST" action="{{ route('admin.users.store') }}">
     @csrf
     <div class="row g-3">
      <div class="col-md-6">
       <label class="form-label">Name</label>
       <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
       @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-6">
       <label class="form-label">Email</label>
       <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
       @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
     </div>

     <div class="row g-3 mt-1">
      <div class="col-md-6">
       <label class="form-label">Role</label>
       <select name="role" class="form-select" required>
        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="customer" {{ old('role') === 'customer' ? 'selected' : '' }}>Customer</option>
       </select>
       @error('role')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-6">
       <label class="form-label">Password</label>
       <input type="password" name="password" class="form-control" required>
       @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
     </div>

     <div class="row g-3 mt-1">
      <div class="col-md-6">
       <label class="form-label">Confirm Password</label>
       <input type="password" name="password_confirmation" class="form-control" required>
      </div>
     </div>

     <div class="d-flex gap-2 mt-4">
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Cancel</a>
     </div>
    </form>
   </div>
  </div>
 </div>
</body>
</html>
