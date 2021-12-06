<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\Municipio;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obras = Obra::get();

        return view('obra',  compact('obras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios = Municipio::get();

        return view('addObra', compact('municipios'));
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
            'direccion' => 'required',
            'municipio_id' => 'required|numeric|min:0|not_in:0',
        ]);

        $newObra = new Obra;
        $newObra->direccion = request('direccion');
        $newObra->municipio_id = request('municipio_id');
        $newObra->empresa_id = 0;

        $newObra->save();

        return redirect()->route('obra');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update($obra_id)
    {
        if(empty(request()->all())) {
            $municipios = Municipio::get();
            $obra = Obra::findOrFail($obra_id);
            return view('modObra', ['obra_id'=>$obra_id], compact('obra', 'municipios'));
        };

        request()->validate([
            'direccion' => 'required',
            'municipio_id' => 'required|numeric|min:0|not_in:0',
        ]);

        $obra = Obra::findOrFail(request('obra_id'));

        $obra->direccion = request('direccion');
        $obra->municipio_id = request('municipio_id');

        $obra->save();

        return redirect()->route('obra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $obra_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($obra_id)
    {
        if(empty(request()->all())) {
            $obra = Obra::findOrFail($obra_id);
            return view('deleteObra', ['obra_id'=>$obra_id], compact('obra'));
        };

        $obra = Obra::findOrFail(request('obra_id'));

        $obra->delete();

        return redirect()->route('obra');
    }
}
