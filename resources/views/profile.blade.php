@extends('layouts.layout_profile')

@section('title', '| profile')

@section('css')
<link rel='stylesheet' href='{{ asset('css/profile.css') }}'>
@endsection

@section('script')
<script src='{{ asset('js/profile.js') }}' defer></script>
<script type="text/javascript">
    const CSFR_TOKEN = '{{ csrf_token() }}';
    const REMOVE_LIKES_PROFILE = "{{route('remove_likes_profile')}}";
    const STAMPA_LIKES = "{{route('stampa_likes')}}";
</script>
@endsection

@section('contenuto')
<div id="overlay"> </div> 

           <nav>
                  <div id="collegamenti">
                      <a href="{{ route('home') }}"> HOME  </a>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT </a>
                  </div>

                <div id="menu">
                  <div></div>
                  <div></div>
                  <div></div>
               </div>

          </nav>

           
               <h1><strong> BENTORNATO </strong></h1> 
               
                <!--se non ho fatto il login non ho nessuna variabile di sessione settata, si ritorna login-->
                      <h2>{{ $username_sessione }} </h2>; <!-- nel ProfileController passiamo il valore con with alla view profile -->
                

                
                
               <form  name ='search_comics' id='stampa_comics'   >
               @csrf
               
                <input type="submit" id="mostra_comics" value="Mostra i miei fumetti preferiti">
                </form>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">  <!-- Inserire il form per il logout -->
        @csrf
        </form>
              
@endsection