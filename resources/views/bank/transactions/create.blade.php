@extends('layouts.app') 
@section('header')
    @include('bank.header')
@endsection
 
@section('title') Realizar depósito
@endsection


@section('title', 'Crear Bóveda') 
@section('content')

<div class="panel-body">
    {!! Form::open(['method' => 'POST', 'route' => 'transactions.store']) !!} {!! Field::select('vault_id', $vaults, ['label' => 'Seleccionar
    la Bóveda en la que se va a depositar', 'required', 'class' => 'chosen-select']) !!} {!! Field::text('reason', ['label'
    => 'Motivo del depósito', 'required']) !!} {!! Field::url('request', ['label' => 'Ingresar la URL de la petición', 'required'])
    !!} {!! Field::number('amount', ['label' => 'Ingresar la cantidad a depositar', 'required']) !!} {!! Field::date('deposit_date',
    ['required', 'label' => 'Fecha del Depósito', 'type' => 'date']) !!} {!! Form::submit('Crear Bóveda', ['class' => 'btn
    btn-primary']) !!} {!! Form::close() !!}
</div>
@endsection
 
@section('javascript')
<script>
    $(".chosen-select").chosen({no_results_text: "Lo siento, estás buscando algo que no existe"});

</script>
@endsection