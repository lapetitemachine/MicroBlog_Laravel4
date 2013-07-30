@extends('layout')


@section('content')

    {{ Form::open(array('route' => 'sign-up', 'novalidate')) }}
        
        <legend>Sign Up</legend>
        

        <fieldset>
           
            {{ Form::label('username') }}
            {{ $errors->first('username', '<span class="error">:message</span>') }}
            {{ Form::text('username', Input::old('username')) }}   

            {{ Form::label('password') }}  
            {{ $errors->first('password', '<span class="error">:message</span>') }}      
            {{ Form::password('password') }}  
    
            {{ Form::label('confirmation', 'Confirm password') }}       
            {{ $errors->first('confirmation', '<span class="error">:message</span>') }} 
            {{ Form::password('confirmation') }}  

            {{ Form::submit('Sign Up') }} 
       
        </fieldset>
        
     {{ Form::close() }}

@stop