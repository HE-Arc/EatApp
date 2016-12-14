@extends('layouts.titleToContent')

@section('childContent')

    <div>
        {!! Form::open(['route' => 'list.store']) !!}
        <div>
            {!! Form::label('nom', 'Nom de la liste:') !!}
            {!! Form::text('nom', null) !!}
        </div>
        {!! Form::submit('Créer une nouvelle liste') !!}
        {!! Form::close() !!}
    </div>

@endsection