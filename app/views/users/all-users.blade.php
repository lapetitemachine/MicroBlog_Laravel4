@extends('layout')


@section('content')

<ul id="users">
   
   @foreach($users as $user)
    <li>
        <a href="{{ route('see-profile', array('username' => $user->username)) }}">
            {{  HTML::avatar($user) }}   
            <strong>{{ $user->username }}</strong>
            <i class="icon-chevron-right"></i>
            @if($user->bio)
                <span>{{{ $user->bio }}}</span>
            @endif
        </a>
    </li>
    @endforeach

</ul>

@stop