@extends('layouts.app')
@section('content')
    <x-alert type="info" message="Hi!" />
    <x-button type="success">
        Yes
    </x-button>
    <h1>Welcome to the Students Module</h1>
    <p class="lead">This is your homepage where you can manage student profiles and perform related actions.</p>
    <a href="{{ route('students') }}" class="btn btn-primary">Go to Student List</a>
    <x-card>
        <x-slot:header>
            Card Title
        </x-slot>
        <x-slot:name>
            John
        </x-slot>
        Body
    </x-card>

    <table class="table">
        <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Country ID</th>
            <th>Created Date</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <th>{{ $book->id }}</th>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->country_id }}</td>
                    <td>{{ $book->created_at }}</td>
                    <td>sda</td>
                </tr>
            @endforeach
        </tbody>
    @endsection
