<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">  
        <title>LaravelMvc</title>
        {{ HTML::style('css/reset.css'); }} 
        {{ HTML::style('css/style.css'); }} 
        {{ HTML::style('css/font-icons.css'); }} 
    </head>
    <body>
      
        <header>        
            <h1>
                MicroBlogMVC
                <small>- Laravel 4.0.5</small>
            </h1>
            <div>
                Written by 
                <a href="#">Someone</a>
            </div>
        </header>


        @include('nav')

        
        <section>

            @foreach (['alert-success', 'alert-info'] as $type)
                @if(Session::has($type))
                    <p class="{{ $type }}">
                        {{ Session::get($type) }}
                    </p>   
                @endif
            @endforeach
        
            
           @yield('content')

        </section>

    </body>
</html>
