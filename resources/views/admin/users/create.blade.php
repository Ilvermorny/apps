@extends('layouts.app') 
@section('header')
    @include('admin.header')
@endsection
 
@section('title')
Crear Usuario
@endsection
 
@section('content')

<div class="panel-body">
    <h2 class="pb-2">Crear Usuario</h2>
    {!! Form::open(['method' => 'POST', 'route' => 'users.store']) !!}
        {!! Field::text('name', ['label' => 'Nombre de Usuario', 'required']) !!}
        {!! Field::email('email', ['label' => 'Email', 'required']) !!}
        {!! Field::select('type', ['user' => 'Normal', 'director' => 'Director del Banco', 'moderator' => 'Moderador Global', 'admin' => 'Administrador'], ['label' => 'Tipo de Usuario', 'required']) !!}
        {!! Field::password('password', ['label' => 'Contraseña', 'required']) !!}
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!} 
    {!! Form::close() !!}
</div>
@endsection