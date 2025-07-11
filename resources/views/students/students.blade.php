@extends('layouts.app')
@section('content')
    <main class="container text-center  my-5">
        <h2 class="mb-4">List of Students</h2>
        <x-alert type="danger" message="Boo!" />

        <x-button type="danger">
            No
        </x-button>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <x-student-card studentName="Bren Uy" studentLevel="Senior Programmer" buttonType1="primary" buttonType2="danger" />

            <x-student-card studentName="Rod Padilla" studentLevel="Junior Specialist" buttonType1="success"
                buttonType2="info" />

            <x-student-card studentName="Jude De Guzman" studentLevel="Senior Specialist" buttonType1="danger"
                buttonType2="secondary" />

            <x-student-card studentName="Joff De Vera" studentLevel="Junior Programmer" buttonType1="warning"
                buttonType2="disabled" />

            <x-student-card studentName="Cajer Caldo" studentLevel="Proctor" buttonType1="success"
                buttonType2="info" />

            <x-student-card studentName="Chester Francisco" studentLevel="Instructor" buttonType1="danger"
                buttonType2="warning" />
        </div>
    </main>

    <a href="{{ route('home') }}">Go to index</a>
@endsection
