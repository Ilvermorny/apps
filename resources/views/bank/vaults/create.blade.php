@extends('layouts.app') 
@section('header')
    @include('bank.header')
@endsection
 
@section('title') Crear nueva bóveda
@endsection


@section('title', 'Crear Bóveda') 
@section('content')

<div class="panel-body">
    {!! Form::open(['method' => 'POST', 'route' => 'vaults.store']) !!}
        {!! Field::number('forum', ['label' => 'ID de usuario o del topic de la Familia/Negocio', 'required',]) !!}
        {!! Field::select('type', ['user' => 'Usuario', 'family' => 'Familia', 'business'=> 'Negocio'], 'user', ['required', 'label' => 'Tipo de Bóveda']) !!}
        {!! Field::date('deposit_date', ['required', 'label' => 'Fecha del Depósito', 'type' => 'date']) !!}
        {!! Field::url('request', ['label' => 'Ingresar la URL de la petición', 'required']) !!}
        {!! Form::submit('Crear Bóveda', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@endsection