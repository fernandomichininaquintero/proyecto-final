@extends('layout')

@section('cuerpo')
<div class="container mt-3">
    <div class="row mb-3">
        <div class="col">
            <h3>Obra {{$obra->id}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p id="direccion">Direccion: {{$obra->direccion}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p id="municipio">Municipio: {{$obra->getMunicipioName()}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p id="provinicia">Provinicia: {{$obra->getProvinciaName()}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p id="provinicia">Comunidad Autonoma: {{$obra->getComunidadName()}}</p>
        </div>
    </div>
    <div class="row">
        <a class="btn btn-secondary" href="{{ route('obras') }}">Volver</a> 
    </div>
    
</div>
@endsection