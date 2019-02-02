@extends('layouts.app') 
@section('header')
    @include('bank.header')
@endsection
 
@section('title') Bóveda de {{$vault->getName()}}
@endsection
 
@section('content')
<h2>Bóveda de {{$vault->getName()}} </h2>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Motivo</th>
                <th scope="col">Solicitud</th>
                <th scope="col">Dracots</th>
            </tr>
            <tbody>
                @foreach ($vault->transactions as $transaction)
                <tr>
                    <th scope="row">{{$transaction->id}}</th>
                    <td>{{$transaction->date}}</td>
                    <td>{{$transaction->reason}}</td>
                    <td><a href="{{$transaction->request}}">Ver</a></td>
                    <td>{{$transaction->amount}}</td>
                </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
</div>
@endsection