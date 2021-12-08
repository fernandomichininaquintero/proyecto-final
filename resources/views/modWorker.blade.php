@extends('layout')

@section('cuerpo')
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col">
                <h3>Agregar Obra</h3>
            </div>
        </div>
        <div class="row">
            <form method="POST" id="modObra" action="{{ route('modWorker', ['worker_id'=>$worker->id]) }}">
                @csrf
                <input type="hidden" name="obra_id" value="{{$worker->id}}">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{ old('nombre', $worker->nombre) }}">
                    {!! $errors->first('nombre', '<small style="color: red;">:message</small>') !!}
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" value="{{ old('apellidos', $worker->apellidos) }}">
                    {!! $errors->first('apellidos', '<small style="color: red;">:message</small>') !!}
                </div>
                <div class="form-group">
                    <label for="dni">Dni</label>
                    <input type="text" class="form-control" name="dni" id="dni" placeholder="Dni" value="{{ old('dni', $worker->dni) }}">
                    {!! $errors->first('dni', '<small style="color: red;">:message</small>') !!}
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Calle ..." value="{{ old('direccion', $worker->direccion) }}">
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="{{ old('telefono', $worker->telefono) }}">
                    {!! $errors->first('telefono', '<small style="color: red;">:message</small>') !!}
                </div>
                <div class="form-group">
                    <label for="grupo">Grupos</label>
                    <select class="form-control" name="grupo" id="grupo">
                        <option value="0" selected="true" disabled="disabled">-- Selecciona un Grupo --</option>
                        @foreach($groups as $group)
                            <option value="{{$group->id}}">{{$group->nombre}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('grupo', '<small style="color: red;">:message</small>') !!}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection