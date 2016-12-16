@extends('layouts.titleToContent')

<?php
$titre = "Édition de " . $liste['name'];

?>

@section('childContent')

    <div class="row">
        <div class="panel-group full-width" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title dark-color-hover">
                        <a data-parent="#accordion" class="button-justify open-modal-name">
                            <span class="glyphicon glyphicon-list"></span>
                            {{$liste['name']}}
                        </a>
                    </h4>
                </div>

                <div class="panel-collapse" aria-expanded="true">
                    <div class="panel-body">
                        <table class="table">
                            @foreach($liste['ingredients'] as $ing)
                                <tr id="{{$ing['slug']}}_list" class="ingredient-uncheck">
                                    <td class="ingredient-description">
                                        <span class="glyphicon glyphicon-apple text-primary"></span>
                                        <label for="{{$ing['slug']}}_input">
                                            {{$ing['IngredientName']}}
                                        </label>
                                    </td>
                                    <td class="ingredient-quantity">
                                        <input id="{{$ing['slug']}}_input" type="number"
                                               min="0" max="1000"
                                               class="full-width"
                                               value="{{$ing['Quantity']}}"/>
                                    </td>
                                    <td class="ingredient-unit">
                                        {{$ing['MetricUnit']}}
                                    </td>
                                    <td class="ingredient-delete">
                                        <!-- C'est vraiment dégueu ! -->
                                        <p style="display: none">
                                            {{$LI = \App\ListesIngredients::where('liste_id',$liste['id'])->where('ingredient_id',$ing['id'])->select('id')->get()}}
                                        </p>
                                        {!! Form::open([
                                           'method' => 'DELETE',
                                           'route' => ['listsIngredients.destroy',$LI[0]['id']]
                                         ]) !!}

                                        {!! Form::submit($LI[0]['id'], ['class' => 'glyphicon glyphicon-trash']) !!}
                                        {!! Form::close() !!}
                                        <a href="#" id="{{$ing['slug']}}_check-button"
                                           class="check-button"><span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title create-list-or-ingredient-button">
                        <a href="#" class="button-justify">
                            <span class="glyphicon glyphicon-plus"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div>
        <a href="{{ url('/home') }}">Go back to home</a>
    </div>

    <!-- MODALS -->
@section('modal-content')
    <div>{!! Form::open(['route' => 'listsIngredients.store']) !!}
        <div class="form-group">
            {!! Form::label('Ingredient', 'Ingredient:', ['class' => 'control-label']) !!}
            {!! Form::select('Ingredient', ["Banana" => "BANANANA"], ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Quantity', 'Quantity:', ['class' => 'control-label']) !!}
            {!! Form::text('Quantity', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Add Ingredient',
                array('class' => 'btn btn-primary form-group pull-right'/*, 'data-dismiss' => 'modal'*/)) !!}
        {!! Form::close() !!}</div>
@endsection

<div class="modal fade" id="modal-change-name" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Change name</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($liste,[
                   'method' => 'PATCH',
                   'route' => ['list.update',$liste['id']]
                ]) !!}
                <div class="form-group">
                    {!! Form::label('nom', 'Nom:', ['class' => 'control-label']) !!}
                    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Apply new name',
                        array('class' => 'btn btn-primary form-group pull-right'/*, 'data-dismiss' => 'modal'*/)) !!}
                {!! Form::close() !!}
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