@extends('layouts.app')
@section('content')
    <h1>Students Page</h1>
    <p>{{ $name }} </p>
    <p>{{ $grade }} </p>
    <ul>
        @foreach ($address as $add)
            <li>{{ $add }}</1i>
        @endforeach
    </ul>
    <a href="{{ route('home') }}">Go to index</a>
@endsection
