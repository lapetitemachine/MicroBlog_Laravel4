@extends('layout')


@section('content')

<ul id="messages">
  
    @foreach($messages as $message)
        <li>            
            <div>
                <span>{{ date('d M Y H:i', strtotime($message->created_at)) }}</span>
                @if(Auth::user() && $message->user->id == Auth::user()->id)
                    <a href="{{ route('delete-message', array('messageId' => $message->id)) }}">
                        Delete
                        <i class="icon-remove"></i>
                    </a>
                @endif
            </div>           
            {{  HTML::avatar($message->user) }}   
            <strong>{{ $message->user->username }}</strong>            
            <q>{{{ $message->message }}}</q>
        </li>
    @endforeach

</ul>

@stop