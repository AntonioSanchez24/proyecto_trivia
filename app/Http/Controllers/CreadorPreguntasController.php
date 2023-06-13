<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use App\Http\Requests\StoreCalificacionesRequest;
use App\Http\Requests\UpdateCalificacionesRequest;
use App\Models\PaquetePregunta;

class CreadorPreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('creadorPreguntas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creadorPreguntas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCalificacionesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCalificacionesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calificaciones  $Calificaciones
     * @return \Illuminate\Http\Response
     */
    public function form($id){
        return view('preguntasForm', ['id' => $id]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calificaciones  $Calificaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('creadorPreguntas.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCalificacionesRequest  $request
     * @param  \App\Models\Calificaciones  $Calificaciones
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCalificacionesRequest $request, Calificaciones $Calificaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificaciones  $Calificaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificaciones $Calificaciones)
    {
        //
    }
}
