@extends('layout')   


@section('content')

    {{ Form::open(array('route' => 'new-message', 'novalidate')) }}

        <fieldset>
               
            {{ Form::label('message') }}
            
            {{ $errors->first('message', '<span class="error">:message</span>') }}

            {{ Form::textarea('message', 
                              Input::old('message'),
                              array('rows' =>6)
                              )
            }}
           

            {{ Form::submit('Send') }}   

        </fieldset>
        
    {{ Form::close() }}

@stop