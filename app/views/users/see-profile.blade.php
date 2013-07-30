@extends('layout')


@section('content')

<div id="profile">
    
    <div>     
        @if(Auth::user() && $user->id == Auth::user()->id)
            <a href="{{ route('edit-profile') }}">
                Edit your profile
                <i class="icon-user"></i>
            </a>
        @endif  
        <h2>
            {{  HTML::avatar($user) }}   
            {{ $user->username }}
        </h2>
        @if($user->bio !== null)
            <p>{{ $user->bio }}</p>
        @endif
    </div>

    @if(count($user->messages))    
        <ul> 
            @foreach ($user->messages as $message)
                <li>
                    <div>
                        <span>{{ date('d M Y H:i', strtotime($message->created_at)) }}</span>
                        @if(Auth::user() && $user->id == Auth::user()->id)
                            <a href="{{ route('delete-message', array('messageId' => $message->id)) }}">
                                Delete
                                <i class="icon-remove"></i>
                            </a>
                        @endif
                    </div>
                    <q>{{ $message->message }}</q>
                </li>    
            @endforeach            
        </ul>
    @else
        <p>
            <strong>{{ $user->username }}</strong> has not posted any message yet.
        </p>
    @endif




</div>

@stop