@extends('layout')

@section('content')

{{ Form::open(array('route' => 'edit-profile', 'files'=> true, 'novalidate')) }}
    <legend>Edit your profile</legend>

    <fieldset>
           
        {{ Form::label('avatar') }}
        {{  HTML::avatar($user) }}   
        {{ $errors->first('avatar', '<span class="error">:message</span>') }}
        {{ Form::file('avatar') }}

        {{ Form::label('bio') }}
        {{ $errors->first('bio', '<span class="error">:message</span>') }}
        {{ Form::textarea('bio', 
                          Input::old('bio', Auth::user()->bio),
                          array('rows' =>6)
              )
        }}
        
        {{ Form::submit('Save') }}

    </fieldset>
</form>


@stop
