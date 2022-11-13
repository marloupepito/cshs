<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Calatrava Monitoring System</title>

  <style>
      @media only screen and (max-width: 600px) {
          h1.nav {
            font-size:20px
          }
          div.registration{
            display: none;
          }
        }
        body{
            background-color: white;
        }
  </style>
    </head>
    <body>
       <div id="app">
            <root-app></root-app>
        </div>
    </body>
</html>
