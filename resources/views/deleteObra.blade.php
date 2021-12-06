@extends('layout')

@section('cuerpo')
<div id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Borrar Obra</h5>
      </div>
      <div class="modal-body">
        <p>¿Desea borrar esta obra?</p>
      </div>
      <div class="modal-footer">
        <a href="{{route('obra')}}" class="btn btn-secondary" data-dismiss="modal">Volver</a>
        <form method="POST" action="{{route('deleteObra', ['obra_id'=>$obra->id])}}">
            @csrf
            <input type="hidden" name="obra_id" value="{{$obra_id}}">
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection