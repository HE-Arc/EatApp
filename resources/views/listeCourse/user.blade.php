@extends('layouts.children.titleToContent')

@section('childContent')

    <div>
        <p>Alors, on ajoute qui ?</p>
        <div>
            <a href="{{ url('/home') }}">Go back to home</a>
        </div>
    </div>

@endsection