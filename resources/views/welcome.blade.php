<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <head>
    <body>
        <div id="app">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
                    <a class="navbar-brand" href="#">SGD</a>
                   
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                
                            <li class="nav-item active">
                                <router-link to="/discs" class="nav-link">Liste de diques </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/discTypes" class="nav-link">Type des dicques </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/authors" class="nav-link">Liste des auteurs </router-link>
                            </li>
                        
                            <li class="nav-item">
                                <router-link to="/rays" class="nav-link">Liste des rayons </router-link>
                            </li>
                                
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="container">
                <router-view></router-view>
            </div>
           </div>


        <script src="{{ asset('js/app.js') }}"></script>
   </body>
</html>