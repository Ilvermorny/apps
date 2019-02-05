@extends('layouts.app') 
@section('header')
    @include('admin.header')
@endsection
 
@section('title')
Editando Usuario {{$user->name}}
@endsection
 
@section('content')

<div class="panel-body">
    <h2 class="pb-2">Editando Usuario {{$user->name}}</h2>
    {!! Form::model($user, ['route' => ['users.update', $user]]) !!}
        @method('PUT') 
        {!! Field::text('name', ['label' => 'Nombre de Usuario', 'required']) !!}
        {!! Field::email('email', ['label' => 'Email', 'required']) !!}
        {!! Field::select('type', ['user' => 'Normal', 'director' => 'Director del Banco', 'moderator' => 'Moderador Global', 'admin' => 'Administrador'], ['label' => 'Tipo de Usuario', 'required']) !!}
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!} 
    {!! Form::close() !!}
</div>
@endsection