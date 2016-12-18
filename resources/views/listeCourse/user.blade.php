@extends('layouts.titleToContent')

@section('childContent')

    <div>
        <p>Alors, on ajoute qui ?</p><div>
            <a href="{{ url('/home') }}" class="back-btn pull-right">
                <span class="glyphicon glyphicon-arrow-left">Back</span></a>
        </div>
    </div>

@endsection