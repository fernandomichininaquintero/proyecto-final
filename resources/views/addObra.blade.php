@extends('layout')

@section('cuerpo')
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col">
                <h3>Agregar Obra</h3>
            </div>
        </div>
        <div class="row">
            <form method="POST" id="addObra" action="{{ route('createObra') }}">
                @csrf
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Calle ..." value="{{ old('direccion') }}">
                    {!! $errors->first('direccion', '<small style="color: red;">:message</small>') !!}
                </div>
                <div class="form-group">
                    <label for="municipio">Municipio</label>
                    <select class="form-control" name="municipio_id" id="municipio">
                        <option value="0" selected="true" disabled="disabled">-- Selecciona un Municipio --</option>
                        @foreach($municipios as $municipio)
                        <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('municipio_id', '<small style="color: red;">:message</small>') !!}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection