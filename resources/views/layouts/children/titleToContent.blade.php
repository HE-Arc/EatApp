@extends('layouts.app')

@section('custom-navbar')
    <div id="custom-search-input" class="input-group col-md-12">
        <input id="input-search-recipes" type="text" class="search-query form-control" placeholder="Search Recipes" />
        <span class="input-group-btn">
            <button class="btn steak-btn" type="button">
                <span class=" glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
@endsection

@section('content')
    <h1>
        {{ $titre }}
    </h1>
    @yield('childContent')
@endsection