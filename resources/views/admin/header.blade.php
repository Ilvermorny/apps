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
                <a class="nav-link" href="{{route('vaults.index')}}">Banco</a>
            </li>
            <li class="nav-item active float-right">
                <a class="nav-link" href="{{route('users.index')}}">Usuarios</a>
            </li>
        </ul>
        <span class="navbar-text">
          Panel Administrativo de Apps.Ilvermorny
        </span>
    </div>
</nav>
@endsection