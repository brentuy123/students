@extends('layouts.app')
@section('content')
    <h1 class="mb-4">User List</h1>

    <a href="{{ route('users.add.form') }}" class="btn btn-success mb-3">+ Add User</a>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Created Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->photo)
                            <img src="{{ asset($user->photo) }}" width="50" class="rounded-circle">
                        @else
                            <span class="text-muted">No photo</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('F d, Y, gA') }}</td>
                    <td>
                        <a href="{{ route('users.edit.form', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('users.delete', $user->id) }}" method="POST" class="d-inline delete-btn">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const userId = this.getAttribute('data-id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This action cannot be undone!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/users/delete/${userId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    Swal.fire('Deleted!', data.success, 'success')
                                        .then(() => window.location.reload());
                                })
                                .catch(error => {
                                    Swal.fire('Error', 'Something went wrong!',
                                        'error');
                                });
                        }
                    });
                });
            });
        });
    </script>
@endsection
