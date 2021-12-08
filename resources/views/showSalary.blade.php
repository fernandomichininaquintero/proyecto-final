@extends('layout')

@section('cuerpo')
<div class="container mt-3">
    <div class="row mb-3">
        <div class="col">
            <h3>Trabajador {{$worker->nombre}} {{$worker->apellidos}}</h3>
        </div>
        @if($worker->grupo_id === 4)
        <div class="col">
            <a class="btn btn-primary float-right" href="{{ route('addSalary', ['worker_id'=>$worker->id]) }}">Agregar Metros</a>
        </div>
        @endif
    </div>
    @if($worker->grupo_id === 4)
    <div class="row">
        <table class="table table-bordered table-hover">
            <thead class="thead">
                <tr>
                    <th scope="col">Obra</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Salario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($metrosDias as $metrosDia)
                <tr>
                    <td>{{$metrosDia->obra_id}}</td>
                    <td>{{$metrosDia->fecha}}</td>
                    <td>{{$metrosDia->precio_metro}}</td>
                    <td>{{$metrosDia->cantidad}}</td>
                    <td>{{$metrosDia->getSalary()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="row">
        <p>Salario fijo de: {{$worker->getSalary()}}</p>
    </div>
    @endif
    <div class="row">
        <a class="btn btn-secondary" href="{{ route('worker', ['worker_id'=>$worker->id]) }}">Volver</a> 
    </div>
</div>
@endsection