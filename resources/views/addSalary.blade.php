@extends('layout')

@section('cuerpo')
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col">
                <h3>Agregar Metros de: {{$worker->nombre}} {{$worker->apellidos}}</h3>
            </div>
        </div>
        <div class="row">
            <form method="POST" id="addWorker" action="{{ route('addSalary', ['worker_id'=>$worker->id]) }}">
                @csrf
                <div class="form-group">
                    <label for="cantidad">Catidad</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" value="{{ old('cantidad') }}">
                    {!! $errors->first('cantidad', '<small style="color: red;">:message</small>') !!}
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" name="fecha" id="fecha" placeholder="dd/mm/yyyy" value="{{ old('fecha') }}">
                    {!! $errors->first('fecha', '<small style="color: red;">:message</small>') !!}
                </div>
                <div class="form-group">
                    <label for="obra">Obra</label>
                    <select class="form-control" name="obra" id="obra">
                        <option value="0" selected="true" disabled="disabled">-- Selecciona una Obra --</option>
                        @foreach($obras as $obra)
                            <option value="{{$obra->id}}">{{$obra->direccion}}, {{$obra->getMunicipioName()}}, {{$obra->getProvinciaName()}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('grupo', '<small style="color: red;">:message</small>') !!}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection