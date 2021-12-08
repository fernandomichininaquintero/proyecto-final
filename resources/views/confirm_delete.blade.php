@extends('layout')

@section('cuerpo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Confirmar baja</div>
                <div class="card-body">
                    <p>¿Esta seguro de que desea eliminar su usuario?</p>
                    
                    <form method="POST" action="{{ route('user.delete') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user_id}}">

                        <input class="btn btn-primary" type="submit" value="Borrar">
                        
                        <a class="btn btn-primary" href="{{ route('home') }}">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection