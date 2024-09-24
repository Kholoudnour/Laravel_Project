<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')
@include('admin.includes.header')
@include('admin.includes.footer')

<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  
<div class="container my-5">
    <div class="mx-2">
        <h2 class="fw-bold fs-2 mb-5 pb-2">Edit USER</h2>
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="px-md-5">
            @csrf 
            @method('put')
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
                <div class="col-md-5">
                    <input type="text" name="firstname" placeholder="First Name" class="form-control py-2" value="{{ old('firstname', $user->firstname) }}" />
                    @error('firstname')
                    <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <input type="text" name="lastname" placeholder="Last Name" class="form-control py-2" value="{{ old('lastname', $user->lastname) }}" />
                    @error('lastname')
                    <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">UserName:</label>
                <div class="col-md-10">
                    <input type="text" name="username" placeholder="e.g. Jhon33" class="form-control py-2" value="{{ old('username', $user->username) }}" />
                    @error('username')
                    <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Email:</label>
                <div class="col-md-10">
                    <input type="email" name="email" placeholder="e.g. Jhon@example.com" class="form-control py-2" value="{{ old('email', $user->email) }}" />
                    @error('email')
                    <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">phone:</label>
                <div class="col-md-10">
                    <input type="phone" name="phone" placeholder="01xxxxxxx" class="form-control py-2" value="{{ old('phone', $user->phone) }}" />
                    @error('phone')
                    <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Password:</label>
                <div class="col-md-10">
                    <input type="password" name="password" placeholder="Password" class="form-control py-2" value="{{ old('password', $user->password) }}" />
                    @error('password')
                    <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="active" class="form-label col-md-2 fw-bold text-md-end">Active:</label>
                <div class="col-md-10">
                <input type="hidden" name="active" value="0"> <!-- Hidden field for unchecked state -->
                <input type="checkbox" name="active" value="1" class="form-check-input"  {{ old('active', $user->active ?? false) ? 'checked' : '' }}  style="padding: 0.7rem;" />
                </div>
                
            </div>
            </div>
            <div class="text-md-end">
                <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                    Edit User
                </button>
        </div>
      </form>
    </div>
  </div>
  </main>
 