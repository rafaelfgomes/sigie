<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        @include('partials._head')

    </head>

    <body>

        <div id="app">

            <header>

              @include('partials._navbar')

            </header>

            <div class="container">

                @include('partials._messages')

                <main class="py-4">

                    @yield('content')
  
                </main>

            </div>
        
        </div>
    
    </body>   

</html>
