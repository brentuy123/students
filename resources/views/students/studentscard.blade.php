@extends('layouts.app')
@section('content')
    <main class="container text-center  my-5">
        <h2 class="mb-4">List of Students</h2>
        <x-alert type="danger" message="Boo!" />

        <x-button type="danger">
            No
        </x-button>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($students as $student)
                <x-student-card :studentName="$student['studentName']" :studentLevel="$student['studentLevel']" :buttonType1="$student['buttonType1']" :buttonType2="$student['buttonType2']" />
            @endforeach
        </div>
    </main>

    <a href="{{ route('home') }}">Go to index</a>
@endsection
