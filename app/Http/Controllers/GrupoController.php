<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use App\Clase;
use App\Turno;
use App\Semestre;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::with(['clase', 'turno', 'semestre', 'estudiantes'])->get();
        return view('grupos.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clases = Clase::all();
        $turnos = Turno::all();
        $semestres = Semestre::all();

        return view('grupos.create', compact('clases', 'turnos', 'semestres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'id_clase'   => 'required|exists:clases,id_clase',
                'id_turno'   => 'required|exists:turnos,id_turno',
                'id_semestre'=> 'required|exists:semestres,id_semestre'
            ]);

        Grupo::create($request->all());

        return redirect()->route('grupos.index');
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
    public function edit(Grupo $grupo)
    {
        $clases = Clase::all();
        $turnos = Turno::all();
        $semestres = Semestre::all();

        return view('grupos.edit', compact('grupo', 'clases', 'turnos', 'semestres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        $request->validate(
            [
                'id_clase'   => 'required|exists:clases,id_clase',
                'id_turno'   => 'required|exists:turnos,id_turno',
                'id_semestre'=> 'required|exists:semestres,id_semestre'
            ]);

        $grupo->update($request->all());

        return redirect()->route('grupos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        $grupo->delete();
        return redirect()->route('grupos.index');
    }
}
