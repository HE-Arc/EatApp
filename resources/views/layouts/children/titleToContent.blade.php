@extends('layouts.app')

@section('content')

    <h1>
        {{ $titre }}
    </h1>
    @yield('childContent')
@endsection