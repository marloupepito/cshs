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

        <title>CSHS</title>
        <link rel="manifest" href="manifest.json" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="apple-mobile-web-app-status-bar" content="#db4938" />
        <meta name="theme-color" content="#db4938" />
  <style>
         @media only screen and (min-width:641px) {
            .toHide{
              display: none !important;
            }
          }
         div.botNavbar{
            display: none;
          }
          @media only screen and (max-width: 600px) {
          h1.nav {
            font-size:20px
          }
          div.registration,.sideNavbar{
            display: none;
          }
          div.botNavbar{
            display: '' !important;
          }

        
        }
        div.vs-card{
            margin: 0px !important;
        }
        body{
            background-color: white;
        }
        input.vs-input{
            width: 100%;
        }
        button.vs-sidebar__item.hasIcon::after{
          background-color:rgb(64, 191, 128) !important
        }
        .vs-dialog{
          width:40% !important
        }
       
  </style>
    </head>
    <body>
       <div id="app">
            <root-app></root-app>
        </div>
    </body>
</html>

<!-- <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script> -->

<script>

    if ("serviceWorker" in navigator) {
  window.addEventListener("load", function() {
    navigator.serviceWorker
      .register("/serviceWorker.js")
      .then(res => console.log("service worker registered"))
      .catch(err => console.log("service worker not registered", err))
  })
}
  if ('serviceWorker' in navigator) {
navigator.serviceWorker.register('/firebase-messaging-sw.js')
  .then(function(registration) {
    console.log('Registration successful, scope is:', registration.scope);
  }).catch(function(err) {
    console.log('Service worker registration failed, error:', err);
  });
}
</script>
