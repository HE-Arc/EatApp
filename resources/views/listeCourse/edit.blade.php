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
                        <table id="table" class="table">
                            @foreach($liste['ingredients'] as $ing)
                                <tr id="{{$ing['slug']}}_heading" class="object-delete-failed">
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
                                        <span id="{{$ing['slug']}}_delete-error" class="connection-error"></span>
                                    </td>
                                    <td class="ingredient-unit">
                                        {{$ing['MetricUnit']}}
                                    </td>
                                    <td class="ingredient-delete">
                                        {!! Form::open([
                                           'method' => 'DELETE',
                                           'route' => ['listsIngredients.destroy', $ing['assoc']]
                                         ]) !!}
                                        <a id="{{$ing['slug']}}_delete" href="#"
                                           class="button-justify delete-list-button"><span
                                                    class="glyphicon glyphicon-trash"></span></a>

                                        {!! Form::close() !!}
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
        <a href="{{ url('/home') }}" class="back-btn pull-right">
            <span class="glyphicon glyphicon-arrow-left">Back</span></a>
    </div>

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
                array('class' => 'btn btn-primary form-group pull-right')) !!}
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

            <!-- MODALS -->
@section('modal-content')
    <div>
        {!! Form::open([
        'method' => 'POST',
        'route' => 'listsIngredients.store'
        ]) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('Ingredient', 'Ingredient:', ['class' => 'control-label']) !!}
            <select id="Ingredient" name="Ingredient" class="form-control">
                @foreach($allIng as $ing)
                    <option value="{{$ing['id']}}">{{$ing['IngredientName']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-inline">
            <div class="form-group">
                {!! Form::label('Quantity', 'Quantity:', ['class' => 'control-label']) !!}
                {!! Form::number('Quantity', null, ['class' => 'form-control']) !!}
            </div>
            <select disabled id="Unit" name="Unit" class="form-control">
                @foreach($allIng as $ing)
                    <option value="{{$ing['id']}}">{{$ing['MetricUnit']}}</option>
                @endforeach
            </select>
            <span id="modal-alert" class="connection-error"></span>
        </div>
        <button class="btn btn-primary form-group pull-right add-ing" id="{{$liste['id']}}_add-ing"
                data-dismiss="modal">Add ingredient
        </button>
        {!! Form::close() !!}
    </div>
@endsection
