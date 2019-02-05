@extends('layouts.app') 
@section('header')
    @include('admin.header')
@endsection
 
@section('title', 'Panel de Administración
- Módulo de Usuarios') 
@section('content')

<h2>Administrar Usuarios Registrados <a href="{{route('users.create')}}"><i class="fas fa-user-plus"></i></a></h2>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Tipo de Usuario</th>
                <th scope="col" colspan="3">Acciones</th>
            </tr>
            <tbody style="font-size: 1.3em;">
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->type}}</td>
                    <td style="text-decoration: none;"><a href="{{route('users.edit', $user)}}"><i class="fas fa-user-edit"></i></a></td>
                    <td style="text-decoration: none;"><a href="{{route('users.password', $user)}}"><i class="fas fa-key"></i></a></td>
                    <td style="text-decoration: none;"><a href="#"><i class="fas fa-user-times"></i></a></td>


                </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
    {!!$users->render()!!}
</div>
@endsection