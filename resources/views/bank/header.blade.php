@extends('layouts.header') 
@section('header')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
            aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Ilvermorny</a>
    </div>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('vaults.index')}}">Listado de Bóvedas</a>
            </li>
            @auth
            <li class="nav-item active">
                <a class="nav-link" href="{{route('vaults.create')}}">Abrir Bóveda</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('transactions.create')}}">Realizar Depósito</a>
            </li>
            @if(Auth::user()->type === 'admin')
            <li class="nav-item active">
                <a class="nav-link" href="{{route('users.index')}}">Panel de Administración</a>
            </li>
            @endif
            <li class="nav-item active">
                <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span style="color:red;">Logout</span></a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @else
            <li class="nav-item active">
                <a class="nav-link" href="{{route('login')}}"><span style="color:red;">Login</span></a>
            </li>
            @endauth

        </ul>
        <span class="navbar-text">
          Banco Mágico del MACUSA
        </span>
    </div>
</nav>
@endsection