@extends('layout')

@section('cuerpo')
<div id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usuario no encontrado</h5>
      </div>
      <div class="modal-body">
        <p>No se ha encontrado ningun trabajador o empresa asociado con con este usuario</p>
      </div>
      <div class="modal-footer">
        <a href="{{route('workers')}}" class="btn btn-secondary" data-dismiss="modal">Volver</a>
      </div>
    </div>
  </div>
</div>
@endsection