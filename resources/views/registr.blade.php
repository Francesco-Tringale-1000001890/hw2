@extends('layouts.base')

@section('title', '| registrazione')

@section('css')
<link rel='stylesheet' href='{{ asset('css/registr.css') }}'>
@endsection

@section('script')
<script src='{{ asset('js/registr.js') }}' defer></script>
<script type="text/javascript">
    const REGISTR_ROUTE = "{{route('registr')}}";
</script>
@endsection

@section('form')
<form name='sign_up' method='post' action="{{route('registr')}}">
    @csrf
              <div class="nome">
                <label> Nome <input type='text' name='nome' > </label>
                <span></span>
              </div>
              <div class="cognome"> 
                <label> Cognome <input type='text' name='cognome' > </label>
                <span></span>
              </div>
              <div class="username"> 
                <label> Username <input type='text' name='username' > </label>
                <span></span>
              </div>
              <div class="email"> 
                <label> Email <input type='text' name='email' > </label>
                <span></span>
              </div>
              <div class="password"> 
                <label> Password <input type='password' name='password'> </label>
                <span></span>
              </div>
              <div class="registrati" id="div_registrati"> 
                <input type='submit' id='submit' name='Registrati' value='Registrati' > 
              </div>
              <p id="log">Hai già un account? <a href="{{route('login')}}"> Accedi</a></p>
          </form>
@endsection