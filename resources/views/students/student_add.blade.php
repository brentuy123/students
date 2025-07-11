@extends('layouts.app')
@section('content')
    <h1>Create a Student</h1>
    <form action="{{ route('students.add1') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" requlred>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Country ID</label>
            <input type="text" name="country_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>stocks</label>
            <input type="text" name="stocks" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>amount</label>
            <input type="text" name="amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>photo</label>
            <input type="text" name="photo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Student</button>
        <a href="{{ route('home') }}" type="button" class="btn-btn secondary">Go to index</a>
    </form>
@endsection
