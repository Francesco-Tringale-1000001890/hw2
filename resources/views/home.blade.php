@extends('layouts.layout_home')

@section('title', '| home')

@section('css')
<link rel='stylesheet' href='{{ asset('css/home.css') }}'>
@endsection

@section('script')
<script src='{{ asset('js/home.js') }}' defer></script>
<script type="text/javascript">
    const CSFR_TOKEN = '{{ csrf_token() }}';
    const HOME_ROUTE = "{{route('home')}}";
    const CHECK_LIKE_OR_UNLIKE_ROUTE = "{{route('check_like_or_unlike')}}";
    const ADD_LIKES_ROUTE = "{{route('add_likes')}}";
    const REMOVE_LIKES_ROUTE = "{{route('remove_likes')}}";
</script>
@endsection

@section('contenuto')
<div id="overlay"> </div> 

           <nav>
                  <div id="collegamenti">
                      <a href="{{ route('profile') }}"> PROFILO </a>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT </a>
                      <!--Mi permette di mandare una richiesta post perche' di default e' una richiesta get e tramite
                      event.prevent tolgo questo comportamento di default, invece documente... e' un form che non si 
                    vede ma serve per mandare la richiesta post-->
                  </div>

                <div id="menu">
                  <div></div>
                  <div></div>
                  <div></div>
               </div>

          </nav>

           <h1> 
                Cerca il tuo fumetto  
           </h1>
               <form  name ='search_comics' id='search_comics'   >
                  @csrf
                <input type='text' name ='content' id='content' placeholder="Digita il nome di un supereroe (Example: Hulk, X-man, Spider-man, Iron-man...)" >
                <input type="submit" id="submit" value="Conferma scelta">
              </form>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">  <!-- Inserire il form per il logout -->
                  @csrf
              </form>
@endsection