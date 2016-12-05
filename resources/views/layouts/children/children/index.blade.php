@extends('layouts.children.titleToContent')

@section('childContent')

    <div class="row">
        <div class="panel-group full-width" id="accordion">

            @forelse($listesIng as $id => $info)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#{{$id}}" class="button-justify">
                                <span class="glyphicon glyphicon-list"></span>
                                {{$info['name']}}</a>
                        </h4>
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
                                            <a href="#" id="{{$id}}-{{$ing['id']}}_check-button" class="check-button"><span class="glyphicon glyphicon-ok"></span></a>
                                        </td>
                                    </tr>
                                @empty
                                    <p>ADD AN INGREDIENT MAYBE</p>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            @empty
                <p>CREATE A LIST NO</p>
            @endforelse


        </div>
    </div>


    <div>
        <ul>
            <li>
                <a href="{{ url('/list/1/edit') }}">Go to Edition de liste (test avec liste 1)</a>
            </li>
            <li>
                <a href="{{ url('/list/1/user') }}">Go to Edition des utilisateurs (test avec liste 1)</a>
            </li>
        </ul>
    </div>

@endsection