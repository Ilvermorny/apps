@extends('layouts.app') 
@section('header')
    @include('admin.header')
@endsection
 
@section('title')
Editando Usuario {{$user->name}}
@endsection
 
@section('content')

<div class="panel-body">
    <h2 class="pb-2">Editando la Contraseña del Usuario {{$user->name}}</h2>
    {!! Form::model($user, ['route' => ['users.passwordUpdate', $user]]) !!}
        @method('PUT') 
        {!! Field::password('password', ['label' => 'Ingresar Contraseña', 'required']) !!}
        {!! Field::password('password_confirmation', ['label' => 'Confirmar Contraseña', 'required']) !!}        
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!} 
    {!! Form::close() !!}
</div>
@endsection