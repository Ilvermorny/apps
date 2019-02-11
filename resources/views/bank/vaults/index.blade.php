@extends('layouts.app') 
@section('header')
    @include('bank.header')
@endsection
 
@section('title', 'Lista de Bóvedas Creadas')

@section('content')

<h2>Lista de bóvedas creadas </h2>
<h4>Filtrar por tipo:</h4>
<nav class="nav nav-pills pb-2">
    <a class="nav-link" id="nav-user" href="?type=user">Usuario</a>
    <a class="nav-link" id="nav-family" href="?type=family">Familia</a>
    <a class="nav-link" id="nav-business" href="?type=business">Negocio</a>
</nav>

{!! Form::open(['method' => 'get', 'route' => 'vaults.index']) !!} {!! Field::text('search', ['label' => False, 'placeholder'
=> 'Buscar por nombre', 'class' => 'form-control-lg']) !!} {!! Form::close() !!}


<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Propietario</th>
                <th scope="col"># de depósitos</th>
                <th scope="col">Total de Dracots</th>
                <th scope="col">Ver</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vaults as $vault)
            <tr>
                <th scope="row">{{$vault->id}}</th>
                <td>{{$vault->name}}</td>
                <td>{{$vault->number}}</td>
                <td>{{$vault->total}}</td>
                <td><a href="{{ route('vaults.show', $vault) }}">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $vaults->render() !!}
</div>
@endsection
 
@section('javascript')
<script>
    const active = type => {
        if(type !== '') {
            let navActive = document.getElementById("nav-"+type)
            navActive.classList.add("active")
        }
    }
    active("{{ app('request')->input('type') }}")

</script>
@endsection