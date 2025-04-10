@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
        </div>

        <!-- Email -->
        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>

        <!-- Phone -->
        <div class="form-group mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
        </div>

        <!-- Gender -->
        <div class="form-group mb-3">
            <label>Gender</label><br>
            <label><input type="radio" name="gender" value="male" {{ $user->gender == 'male' ? 'checked' : '' }}> Male</label>
            <label><input type="radio" name="gender" value="female" {{ $user->gender == 'female' ? 'checked' : '' }}> Female</label>
        </div>

        <!-- Hobbies -->
        <div class="form-group mb-3">
            <label>Hobbies</label><br>
            @php $hobbyOptions = ['Reading', 'Music', 'Traveling', 'Gaming', 'Sports']; @endphp
            @foreach($hobbyOptions as $hobby)
                <label class="me-3">
                    <input type="checkbox" name="hobbies[]" value="{{ $hobby }}"
                        {{ in_array($hobby, (array) $user->hobbies) ? 'checked' : '' }}>
                    {{ $hobby }}
                </label>
            @endforeach
        </div>

        <!-- Role -->
        <div class="form-group mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <!-- Password (optional) -->
        <a href="{{ route('users.change-password', $user->id) }}" class="btn btn-sm btn-secondary float-end mb-3">
            Change Password
        </a>
        

        <button class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection
