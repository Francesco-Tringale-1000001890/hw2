@extends('layouts.base')

@section('title', '| login')

@section('css')
<link rel='stylesheet' href='{{ asset('css/login.css') }}'>
@endsection

@section('script')
<script src='{{ asset('js/login.js') }}' defer></script>
<script type="text/javascript">
    const LOGIN_ROUTE = "{{route('login')}}";
</script>
@endsection

@section('form')
<form name='sign_up' method='post' action="{{route('login')}}">
@csrf
              <div class="username"> 
                <label> Username <input type='text' name='username'> </label>
                <span></span>
              </div>
              <div class="password"> 
                <label> Password <input type='password' name='password'> </label>
              </div>
              <div id="accedi"> 
                <input type='submit' value='Accedi'>
              </div>
            <p id="crea_account">Non hai ancora un account? <a href="{{route('registr')}}"> Registrati</a></p>
          </form>
@endsection