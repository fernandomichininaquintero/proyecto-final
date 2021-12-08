@extends('layout')

@section('cuerpo')
<div class="container mt-3">
    <div class="row mb-3">
        <div class="col">
            <h3>Trabajador {{$worker->nombre}} {{$worker->apellidos}}</h3>
        </div>
        <div class="col">
            @if($worker->grupo_id === 4)
                <a class="btn btn-primary float-right" href="{{ route('salary', ['worker_id'=>$worker->id]) }}">Historial Salario</a>
            @else
                <a class="btn btn-primary float-right" href="{{ route('salary', ['worker_id'=>$worker->id]) }}">Salario</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p id="municipio">Dni: {{$worker->dni}}</p>
        </div>
    </div>
    @if($worker->direccion)
    <div class="row">
        <div class="col">
            <p id="direccion">Direccion: {{$worker->direccion}}</p>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col">
            <p id="provinicia">Telefono: {{$worker->telefono}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p id="provinicia">Grupo: {{$worker->getGroupName()}}</p>
        </div>
    </div>
    <div class="row">
        <a class="btn btn-secondary" href="{{ route('workers') }}">Volver</a> 
    </div>
    
</div>
@endsection