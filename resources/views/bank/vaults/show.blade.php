@extends('layouts.app') 
@section('header')
    @include('bank.header')
@endsection
 
@section('title') Bóveda de {{$vault->name}}
@endsection
 
@section('content')
<h2>Bóveda de {{$vault->name}} @auth <a href="{{ route('vaults.edit', $vault) }}"><i class="fas fa-edit"></i></a> @endauth </h2>
<h4 class="pb-3">Link permanente: <a href="{{ route('vaults.specialRedirect', [$vault->type, $vault->forum]) }}">#{{ $vault->forum }}</a>
    <i class="far fa-copy" style="cursor: pointer;" id="copy"></i></h4>
<span style="display:none;" id="bbcode">[boveda={{$vault->type}}]{{$vault->forum}}[/boveda]</span>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Motivo</th>
                <th scope="col">Solicitud</th>
                <th scope="col">Dracots</th>
                @auth
                <th scope="col">Acciones</th> @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($vault->transactions_paginated as $transaction)
            <tr>
                <th scope="row">{{$transaction->id}}</th>
                <td>{{$transaction->deposit_date}}</td>
                <td>{{$transaction->reason}}</td>
                <td><a href="{{$transaction->request}}" target="_blank">Ver</a></td>
                <td>{{$transaction->amount}}</td>
                @auth
                <th scope="col">
                    <a href="{{route('transactions.edit', $transaction)}}"><i class="fas fa-edit"></i></a> @if(Auth::user()->type
                    === 'admin' or Auth::user()->type === 'director')
                    <a href="#" onclick="event.preventDefault(); if(confirm('¿Estás seguro de querer eliminar esta transacción?')){document.getElementById('delete-form-{{$transaction->id}}').submit();}"><i class="fas fa-trash-alt"></i></a>


                    <form id="delete-form-{{$transaction->id}}" style="display: none;" action="{{route('transactions.destroy', $transaction->id)}}"
                        method="post" onsubmit="return confirm('Do you really want to Delete the Task?');">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    @endif
                </th> @endauth
            </tr>
            @endforeach
            <tr>
                <th colspan="4" class="text-right">Total:</th>
                <th>{{ $vault->total }}</th>
                @auth
                <th scope="col">&nbsp;</th> @endauth
            </tr>
        </tbody>
    </table>
    {!!$vault->transactions_paginated->render()!!}
</div>












@section('javascript')
<script src="{{ URL::asset('js/copy.js') }}"></script>
@endsection

@endsection