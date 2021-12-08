@extends('layout')

@section('cuerpo')
<div id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Borrar trabajador</h5>
      </div>
      <div class="modal-body">
        <p>¿Desea borrar este trabajador?</p>
      </div>
      <div class="modal-footer">
        <a href="{{route('workers')}}" class="btn btn-secondary" data-dismiss="modal">Volver</a>
        <form method="POST" action="{{route('deleteWorker', ['worker_id'=>$worker->id])}}">
            @csrf
            <input type="hidden" name="worker_id" value="{{$worker_id}}">
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection