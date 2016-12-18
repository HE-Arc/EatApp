@extends('layouts.app')

@section('custom-navbar')
    <div id="custom-search-input" class="input-group col-md-12">
        <input id="input-search-recipes" type="text" class="search-query form-control" placeholder="Search Recipes" />
        <span class="input-group-btn">
            <button id="search-button" class="btn search-btn" type="button">
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

    <!-- MODALS -->
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add</h4>
                </div>
                <div class="modal-body">
                    @yield('modal-content')
                </div>
                <div class="modal-footer">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-research-results" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Results</h4>
                </div>
                <div class="modal-body">
                    <p class="empty-on-result">Wait for it...</p>
                    <div id="results" class="empty-on-result">

                    </div>
                    <button class="btn btn-primary form-group pull-right" id="end-search"
                            data-dismiss="modal">Close
                    </button>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection