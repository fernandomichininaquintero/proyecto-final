<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\Group;
use App\Models\MetrosDia;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::get();

        return view('workers',  compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::get();

        return view('addWorker', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required|min:9',
            'dni' => 'required',
            'grupo' => 'required|numeric|min:0|not_in:0',
        ]);

        $newWorker = new Worker;
        $newWorker->nombre = request('nombre');
        $newWorker->apellidos = request('apellidos');
        $newWorker->direccion = request('direccion');
        $newWorker->telefono = request('telefono');
        $newWorker->dni = request('dni');
        $newWorker->grupo_id = request('grupo');
        if(request('grupo') === 4){
            $newWorker->cuenta_propia = true;
        }else{
            $newWorker->cuenta_propia = false;
        }

        $newWorker->save();

        return redirect()->route('workers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($worker_id)
    {
        $worker = Worker::find($worker_id);

        if(empty($worker)){
            return view('404worker');
        };
        
        return view('showWorker', ['worker_id'=>$worker_id], compact('worker'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSalary($worker_id)
    {
        $worker = Worker::find($worker_id);

        if(empty($worker)){
            return view('404worker');
        };
        
        if($worker->grupo_id === 4){
            $metrosDias = MetrosDia::where('trabajador_id', $worker->id)->get();

            return view('showSalary', ['worker_id'=>$worker_id], compact('worker', 'metrosDias'));
        }
        
        return view('showSalary', ['worker_id'=>$worker_id], compact('worker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($worker_id)
    {
        if(empty(request()->all())) {
            $groups = Group::get();
            $worker = Worker::find($worker_id);

            if(!$worker){
                return view('404worker');
            }
            
            return view('modWorker', ['worker_id'=>$worker_id], compact('worker', 'groups'));
        };

        request()->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required|min:9',
            'dni' => 'required',
            'grupo' => 'required|numeric|min:0|not_in:0',
        ]);

        $worker = Worker::find(request('worker_id'));

        if(!$worker){
            return view('404worker');
        };

        $worker->nombre = request('nombre');
        $worker->apellidos = request('apellidos');
        $worker->direccion = request('direccion');
        $worker->telefono = request('telefono');
        $worker->dni = request('dni');
        $worker->grupo_id = request('grupo');

        if(request('grupo') === 4){
            $worker->cuenta_propia = true;
        }else{
            $worker->cuenta_propia = false;
        }

        $worker->save();

        return redirect()->route('workers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $obra_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($worker_id)
    {
        if(empty(request()->all())) {
            $worker = Worker::find($worker_id);

            if(!$worker){
                return view('404worker');
            }
            return view('deleteWorker', ['worker_id'=>$worker_id], compact('worker'));
        };

        $worker = Worker::find(request('worker_id'));

        if(!$worker){
            return view('404worker');
        }

        $worker->delete();

        return redirect()->route('workers');
    }
}
