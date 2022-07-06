<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('css')
    @yield('script')    
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@200;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inspiration&display=swap" rel="stylesheet">
  </head>

  <body>
      <header>   
  @yield('contenuto')
 </header>

<section>
        
        <div class="loading"></div>
        <section id="comics_view">
        </section>
        <section id="comics_view_error">
        </section>

</section>


<footer> 
  <address> Francesco-Tringale-1000001890 </address>
    <p> Catania</p>
  
</footer>

  </body>

</html>