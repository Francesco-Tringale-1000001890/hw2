<html>
  
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('css')
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
   @yield('script') 
  </head>
  
  <body>
    <div id="overlay"></div>
      <main>
         @yield('form')
      </main>
  </body>

</html>