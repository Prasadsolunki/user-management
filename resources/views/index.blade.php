@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-2">Add User</a>
    <a href="{{ route('users.export.excel') }}" class="btn btn-success">Export Excel</a>
    <a href="{{ route('users.export.pdf') }}" class="btn btn-danger">Export PDF</a>

    <table class="table">
        <thead>
            <tr><th>Name</th><th>Email</th><th>Phone</th><th>Gender</th><th>Role</th><th>Actions</th></tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td><td>{{ $user->email }}</td><td>{{ $user->phone }}</td>
                <td>{{ ucfirst($user->gender) }}</td><td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $user->id }}">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script>
$('.delete-btn').click(function() {
    let id = $(this).data('id');
    if(confirm('Are you sure?')) {
        $.ajax({
            url: '/users/' + id,
            type: 'DELETE',
            data: { _token: '{{ csrf_token() }}' },
            success: () => location.reload()
        });
    }
});
</script>
@endsection
