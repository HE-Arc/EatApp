@extends('layouts.titleToContent')

@section('childContent')

    <div class="row">
        <div class="panel-group full-width" id="accordion">

            @forelse($listTab as $id => $info)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title dark-color-hover">
                            <a data-toggle="collapse" data-parent="#accordion" href="#{{$info['slug']}}" class="button-justify">
                                <span class="glyphicon glyphicon-list"></span>
                                {{$info['name']}}</a>
                        </h4>
                        <div class="edit-button pull-right dark-color-hover">
                            <a href="{{ url('/list/' . $id . '/edit')}}" class="button-justify"><span
                                        class="glyphicon glyphicon-pencil"></span></a>
                        </div>
                        <div class="edit-button pull-right dark-color-hover">
                            <a href="{{ url('/list/' . $id . '/user') }}" class="button-justify"><span
                                        class="glyphicon glyphicon-user"></span></a>
                        </div>
                    </div>

                    <div id="{{$info['slug']}}" class="panel-collapse collapse" aria-expanded="false">
                        <div class="panel-body">
                            <table class="table">
                                @forelse($info['ingredients'] as $ing)
                                    <tr id="{{$info['slug']}}-{{$ing['slug']}}_list" class="ingredient-uncheck">
                                        <td class="ingredient-description">
                                            <span class="glyphicon glyphicon-apple text-primary"></span>
                                            <label for="{{$info['slug']}}-{{$ing['slug']}}_input">
                                                {{$ing['IngredientName']}}
                                            </label>
                                        </td>
                                        <td class="ingredient-quantity">
                                            <input disabled id="{{$info['slug']}}-{{$ing['slug']}}_input" type="number" min="0" max="1000"
                                                   class="full-width"
                                                   value="{{$ing['Quantity']}}"/>
                                        </td>
                                        <td class="ingredient-unit">
                                            {{$ing['MetricUnit']}}
                                        </td>
                                        <td class="ingredient-delete">
                                            <a href="#" id="{{$info['slug']}}-{{$ing['slug']}}_check-button"
                                               class="check-button"><span class="glyphicon glyphicon-ok"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="ingredient-uncheck">
                                        <td class="ingredient-description">
                                            This list is empty. Change that by adding an ingredient !
                                            <div class="create-list-or-ingredient-button">
                                                <a href="{{ url('/list/' . $id . '/edit')}}" class="button-justify">
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
                        <a href="{{url('/list/create')}}" class="button-justify">
                            <span class="glyphicon glyphicon-plus"></span></a>
                    </div>
            </div>

        </div>
    </div>

@endsection