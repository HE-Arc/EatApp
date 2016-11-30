@extends('layouts.children.titleToContent')

<?php
$titre = "Édition de " . $liste->nom;
?>

@section('childContent')

    <div>
        <p>C'est super, ça marche !</p>
        <div>
            <a href="{{ url('/home') }}">Go back to home</a>
        </div>
    </div>

    <form method="POST" action="{{ route("list.update", ["list" => $liste]) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        ...

        <input type="submit">
    </form>

@endsection