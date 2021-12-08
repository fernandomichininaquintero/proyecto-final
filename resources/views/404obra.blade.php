@extends('layout')

@section('cuerpo')
<div id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Obra no encontrada</h5>
      </div>
      <div class="modal-body">
        <p>No se ha encontrado ninguna obra con ese id</p>
      </div>
      <div class="modal-footer">
        <a href="{{route('obra')}}" class="btn btn-secondary" data-dismiss="modal">Volver</a>
      </div>
    </div>
  </div>
</div>
@endsection