<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\Municipio;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obras = Obra::paginate(3);

        return view('obras',  compact('obras'));
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

        return redirect()->route('obras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($obra_id)
    {
        $obra = Obra::find($obra_id);

        if(empty($obra)){
            return view('404obra');
        };

        return view('showObra', ['obra_id'=>$obra_id], compact('obra'));
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
            $obra = Obra::find($obra_id);

            if(!$obra){
                return view('404obra');
            }
            
            return view('modObra', ['obra_id'=>$obra_id], compact('obra', 'municipios'));
        };

        request()->validate([
            'direccion' => 'required',
            'municipio_id' => 'required|numeric|min:0|not_in:0',
        ]);

        $obra = Obra::find(request('obra_id'));

        if(!$obra){
            return view('404obra');
        }

        $obra->direccion = request('direccion');
        $obra->municipio_id = request('municipio_id');

        $obra->save();

        return redirect()->route('obras');
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
            $obra = Obra::find($obra_id);

            if(!$obra){
                return view('404obra');
            }
            return view('deleteObra', ['obra_id'=>$obra_id], compact('obra'));
        };

        $obra = Obra::find(request('obra_id'));

        if(!$obra){
            return view('404obra');
        }

        $obra->delete();

        return redirect()->route('obras');
    }
}
