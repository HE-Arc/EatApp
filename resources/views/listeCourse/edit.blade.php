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
                        <a data-parent="#accordion" class="button-justify">
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
                                        <input disabled id="{{$ing['slug']}}_input" type="number"
                                               min="0" max="1000"
                                               class="full-width"
                                               value="{{$ing['Quantity']}}"/>
                                    </td>
                                    <td class="ingredient-unit">
                                        {{$ing['MetricUnit']}}
                                    </td>
                                    <td class="ingredient-delete">
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

    {!! Form::model($liste,[
       'method' => 'PATCH',
       'route' => ['list.update',$liste['id']]
    ]) !!}
    <div class="form-group">
        {!! Form::label('nom', 'Nom:', ['class' => 'control-label']) !!}
        {!! Form::text('nom', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Modifier la liste') !!}
    {!! Form::close() !!}


    {!! Form::open([
        'method' => 'DELETE',
        'route' => ['list.destroy',$liste['id']]
    ]) !!}

    {!! Form::submit('Supprimer cette liste ?') !!}
    {!! Form::close() !!}

    {{--<form method="POST" action="{{ route("list.update", ["list" => $liste]) }}">--}}
    {{--{{ csrf_field() }}--}}
    {{--{{ method_field('PUT') }}--}}
    {{--<input type="submit">--}}
    {{--</form>--}}

@endsection