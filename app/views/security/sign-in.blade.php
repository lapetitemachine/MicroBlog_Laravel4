@extends('layout')


@section('content')

    {{ Form::open(array('route' => 'sign-in', 'novalidate')) }}
        
        

        <fieldset>
            
            <legend>Sign In</legend>
            
            @if (Session::has('signInFail'))
                <div class="alert-error">Bad credentials</div>
            @endif
           
            {{ Form::label('username') }}
            {{ Form::text('username', Input::old('username')) }}   

            {{ Form::label('password') }}        
            {{ Form::password('password') }}  
    
            {{ Form::submit('Sign In') }} 
       
        </fieldset>
        
     {{ Form::close() }}

@stop