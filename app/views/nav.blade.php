<?php 
    $currentRoute = Route::currentRouteName();
    $usernameParameter = Route::getCurrentRoute()->getParameter('username');
?>
<nav>
    <div class="wrapper">
        <ul>
        
            {{-------------------------------------------------------}}
            <li {{ $currentRoute == 'home' ? ' class="active"' : '' }}>
                <a href="{{route('home')}}">
                      <i class="icon-quote-right"></i>
                      Messages
                </a>
            </li>
        

            {{-------------------------------------------------------}}
            <li {{ $currentRoute == 'users' ? ' class="active"' : '' }}>
                <a href="{{route('users')}}">
                      <i class="icon-group"></i>
                      Users
                </a>
            </li>    

      @if (Auth::check())

            {{-------------------------------------------------------}}
            <li {{ $currentRoute == 'new-message' ? ' class="active"' : '' }}>
                <a href="{{ route('new-message') }}">
                    <i class="icon-pencil"></i>
                    New message
                </a>
            </li>
            
        
            {{-------------------------------------------------------}}
            <li {{ (($currentRoute == 'see-profile' && Auth::user()->username == $usernameParameter) || $currentRoute == 'edit-profile' ) ? ' class="active"' : '' }}>
                <a href="{{ route('see-profile', array('username' => Auth::user()->username)) }}"> 
                    <i class="icon-user"></i>
                    {{ Auth::user()->username }}
                </a>
            </li>
            

            {{-------------------------------------------------------}}
            <li class="connection">
                <a href="{{ route('sign-out') }}">
                    Sign out
                </a>
            </li>
        
        @else
        
            {{-------------------------------------------------------}}
            <li class="{{ $currentRoute == 'sign-up' ? 'active ' : '' }}connection">
                <a href="{{ route('sign-up') }}">
                    Sign Up
                </a>
            </li>
        

            {{-------------------------------------------------------}}
            <li class="{{ $currentRoute == 'sign-in' ? 'active ' : '' }}connection">
                <a href="{{ route('sign-in') }}">
                    Sign In
                </a>
            </li>      

        @endif

        </ul>
    </div>
</nav>

