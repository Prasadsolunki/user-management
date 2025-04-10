<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User List PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>User List</h2>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Hobbies</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ ucfirst($user->gender) }}</td>
                <td>
                    @if(is_array($user->hobbies))
                        {{ implode(', ', $user->hobbies) }}
                    @endif
                </td>
                <td>{{ ucfirst($user->role) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
