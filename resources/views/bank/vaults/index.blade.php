@extends('layouts.app') 
@section('header')
    @include('bank.header')
@endsection
 
@section('title', 'Lista de Bóvedas Creadas')

@section('content')

<h2>Lista de bóvedas creadas </h2>
Escribir en el campo de búsqueda para localizar una bóveda

<div class="card-deck">
    @foreach ($vaults as $vault)
    <a href="{{ route('vaults.show', $vault) }}">
        <div class="card bg-light mb-3" style="max-width: 18rem;">
            <div class="card-body">
                Bóveda de {{ $vault->name }}
            </div>
        </div>
    </a>
    @endforeach
</div>
@endsection