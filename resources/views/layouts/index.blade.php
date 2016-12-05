@extends('layouts.titleToContent')

@section('childContent')

    <div class="row">
        <div class="panel-group full-width" id="accordion">

            @forelse($listesIng as $id => $info)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title dark-color-hover">
                            <a data-toggle="collapse" data-parent="#accordion" href="#{{$id}}" class="button-justify">
                                <span class="glyphicon glyphicon-list"></span>
                                {{$info['name']}}</a>
                        </h4>
                        <div class="edit-button pull-right dark-color-hover">
                            <a href="{{ url('/list/1/edit')}}" class="button-justify"><span
                                        class="glyphicon glyphicon-pencil"></span></a>
                        </div>
                    </div>

                    <div id="{{$id}}" class="panel-collapse collapse" aria-expanded="false">
                        <div class="panel-body">
                            <table class="table">
                                @forelse($info['ingredients'] as $ing)
                                    <tr id="{{$id}}-{{$ing['id']}}_list" class="ingredient-uncheck">
                                        <td class="ingredient-description">
                                            <span class="glyphicon glyphicon-apple text-primary"></span>
                                            <label for="{{$ing['desc']}}_input"> {{$ing['desc']}}</label>
                                        </td>
                                        <td class="ingredient-quantity">
                                            <input id="{{$ing['desc']}}_input" type="number" min="0" max="1000"
                                                   class="full-width"
                                                   value="{{$ing['quantity']}}"/>
                                        </td>
                                        <td class="ingredient-unit">
                                            {{$ing['unit']}}
                                        </td>
                                        <td class="ingredient-delete">
                                            <a href="#" id="{{$id}}-{{$ing['id']}}_check-button"
                                               class="check-button"><span class="glyphicon glyphicon-ok"></span></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="ingredient-uncheck">
                                        <td class="ingredient-description">
                                            This list is empty. Change that by adding an ingredient !
                                            <div class="create-list-or-ingredient-button">
                                                <a href="{{ url('/list/1/edit')}}" class="button-justify">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            @empty
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            No existing list for now ! Change that by clicking the button below to create one !
                        </h4>
                    </div>
                </div>
            @endforelse

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title create-list-or-ingredient-button">
                        <a href="#" class="button-justify">
                            <span class="glyphicon glyphicon-plus"></span></a>
                    </div>
            </div>

        </div>
    </div>

@endsection