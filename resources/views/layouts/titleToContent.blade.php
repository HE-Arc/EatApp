@extends('layouts.app')

@section('custom-navbar')
    <div id="custom-search-input" class="input-group col-md-12">
        <input id="input-search-recipes" type="text" class="search-query form-control" placeholder="Search Recipes" />
        <span class="input-group-btn">
            <button class="btn search-btn" type="button">
                <span class=" glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
@endsection

@section('content')
    <div id="list-header-container">
        <div id="list-title">
            {{ $titre }}
        </div>
    </div>
    @yield('childContent')
@endsection