@extends('layout')

@section('cuerpo')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @guest
                    <div class="card-header">Bienvenido Invitado</div>
                @else
                    <div class="card-header">Bienvenido {{Auth::user()->email}}</div>
                @endguest
                <div class="card-body">
                    Bienvenido a tu pagina de gestion de obras y trabajadores.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
