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

@endsection