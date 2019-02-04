@extends('layouts.app') 
@section('header')
    @include('bank.header')
@endsection
 
@section('title') Bóveda de {{$vault->name}}
@endsection
 
@section('content')
<h2>Bóveda de {{$vault->name}} @auth <a href="{{ route('vaults.edit', $vault) }}"><i class="fas fa-edit"></i></a> @endauth </h2>
<h4 class="pb-3">Link permanente: <a href="{{ route('vaults.specialRedirect', [$vault->type, $vault->forum]) }}">#{{ $vault->forum }}</a></h4>
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
                @foreach ($vault->transactions_paginated as $transaction)
                <tr>
                    <th scope="row">{{$transaction->id}}</th>
                    <td>{{$transaction->deposit_date}}</td>
                    <td>{{$transaction->reason}}</td>
                    <td><a href="{{$transaction->request}}" target="_blank">Ver</a></td>
                    <td>{{$transaction->amount}}</td>
                </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
    {!!$vault->transactions_paginated->render()!!}
</div>
@endsection