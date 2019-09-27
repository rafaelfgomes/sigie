<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        @include('partials._head')

    </head>

    <body>

        <div class="container">

            <div id="app">

                <main class="py-4">
    
                    @yield('content')
    
                </main>
            
            </div>

        </div>
    
    </body>

</html>
