@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store') }}" id="registerForm" novalidate>
                        @csrf
                    
                        <!-- Name -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    
                        <!-- Email -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    
                        <!-- Phone -->
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Phone</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                       name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    
                        <!-- Gender -->
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Gender</label>
                            <div class="col-md-6 pt-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="male" required>
                                    <label class="form-check-label">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="female" required>
                                    <label class="form-check-label">Female</label>
                                </div>
                                @error('gender')
                                <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    
                        <!-- Hobbies -->
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Hobbies</label>
                            <div class="col-md-6 pt-2">
                                @php $hobbies = ['Reading', 'Traveling', 'Music', 'Sports', 'Gaming']; @endphp
                                @foreach($hobbies as $hobby)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="hobbies[]" value="{{ $hobby }}">
                                        <label class="form-check-label">{{ $hobby }}</label>
                                    </div>
                                @endforeach
                                @error('hobbies')
                                <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    
                        <!-- Role -->
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>
                            <div class="col-md-6">
                                <select class="form-select @error('role') is-invalid @enderror" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('role')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    
                        <!-- Password -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password" required>
                                @error('password')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    
                        <!-- Confirm Password -->
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                            </div>
                        </div>
                    
                        <!-- Submit -->
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#registerForm').on('submit', function (e) {
            let valid = true;
    
            // Reset errors
            $('.is-invalid').removeClass('is-invalid');
            $('.invalid-feedback').remove();
    
            function setInvalid(selector, message) {
                $(selector).addClass('is-invalid');
                if ($(selector).next('.invalid-feedback').length === 0) {
                    $(selector).after('<div class="invalid-feedback">' + message + '</div>');
                }
            }
    
            // Name
            if ($('#name').val().trim() === '') {
                setInvalid('#name', 'Name is required');
                valid = false;
            }
    
            // Email
            const email = $('#email').val().trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === '') {
                setInvalid('#email', 'Email is required');
                valid = false;
            } else if (!emailPattern.test(email)) {
                setInvalid('#email', 'Email is invalid');
                valid = false;
            }
    
            // Phone
            if ($('#phone').val().trim() === '') {
                setInvalid('#phone', 'Phone number is required');
                valid = false;
            }
    
            // Gender
            if (!$('input[name="gender"]:checked').val()) {
                // just highlight both gender radios
                $('input[name="gender"]').addClass('is-invalid');
                if ($('#gender-error').length === 0) {
                    $('input[name="gender"]').last().parent().after(
                        '<div class="text-danger" id="gender-error">Please select a gender.</div>'
                    );
                }
                valid = false;
            }
    
            // Hobbies
            if ($('input[name="hobbies[]"]:checked').length === 0) {
                if ($('#hobbies-error').length === 0) {
                    $('input[name="hobbies[]"]').last().parent().after(
                        '<div class="text-danger" id="hobbies-error">Please select at least one hobby.</div>'
                    );
                }
                valid = false;
            }
    
            // Role
            if ($('select[name="role"]').val() === '') {
                setInvalid('select[name="role"]', 'Please select a role');
                valid = false;
            }
    
            // Password
            const password = $('#password').val();
            const confirm = $('#password-confirm').val();
            if (password.length < 6) {
                setInvalid('#password', 'Password must be at least 6 characters');
                valid = false;
            } else if (password !== confirm) {
                setInvalid('#password-confirm', 'Passwords do not match');
                valid = false;
            }
    
            // ❌ If anything invalid, stop submission
            if (!valid) {
                e.preventDefault();
            }
        });
    });
    </script>
    
    
    
