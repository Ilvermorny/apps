@extends('layouts.app') 
@section('header')
    @include('bank.header')
@endsection
 
@section('title') Editando bóveda de {{ $vault->name }}
@endsection


@section('title', 'Add a New Task') 
@section('content')

<div class="panel-body">
    <h2 class="pb-2">Editando bóveda de {{ $vault->name }}</h2>
    <p>La edición de una bóveda tiene como único objetivo actualizar el nombre y URL de la bóveda</p>
    {!! Form::model($vault, ['route' => ['vaults.update', $vault]]) !!}
        @method('PUT')
        {!! Field::number('forum', ['label' => 'ID de usuario o del topic de la Familia/Negocio', 'required', 'disabled']) !!}
        {!! Field::select('type', ['user' => 'Usuario', 'family' => 'Familia', 'business'=> 'Negocio'], ['required', 'disabled','label' => 'Tipo de Bóveda']) !!}
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@endsection