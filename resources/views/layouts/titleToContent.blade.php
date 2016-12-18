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
@endsection