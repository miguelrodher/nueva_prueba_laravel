<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante; 
use App\Grupo;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::with('grupo')->get();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupo::all();
        return view('estudiantes.create', compact('grupos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);

        $request->validate(
            [
                'nombre'     => 
                [
                    'required',
                    'string',
                    'min:3',
                    'max:20',                 
                    'regex:/^[\p{L}\s\'-]+$/u',   
                ],
                'apellido_paterno' => 
                [
                    'required',
                    'string',
                    'min:3',
                    'max:20',                 
                    'regex:/^[\p{L}\s\'-]+$/u',   
                ],
                'apellido_materno' => 
                [
                    'required',
                    'string',
                    'min:3',
                    'max:20',                 
                    'regex:/^[\p{L}\s\'-]+$/u',   
                ],
                'edad'       => 
                [
                    'required',
                    'integer',
                    'min:1',
                    'max:124'
                ],
                'email'      => 
                [
                    'required',
                    'email', 
                    'unique:estudiantes,email'
                ],
                'telefono'   => 
                [
                    'required',
                    'string',
                    'size:10',
                    'regex:/^[0-9]+$/',
                ],
                'id_grupo'   => 
                [
                    'required',
                    'exists:grupos,id_grupo'
                ]
            ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index');
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
    public function edit(Estudiante $estudiante)
    {
        $grupos = Grupo::all();
        return view('estudiantes.edit', compact('estudiante','grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate(
            [
                'nombre'     => 
                [
                    'required',
                    'string',
                    'min:3',
                    'max:20',                 
                    'regex:/^[\p{L}\s\'-]+$/u',   
                ],
                'apellido_paterno' => 
                [
                    'required',
                    'string',
                    'min:3',
                    'max:20',                 
                    'regex:/^[\p{L}\s\'-]+$/u',   
                ],
                'apellido_materno' => 
                [
                    'required',
                    'string',
                    'min:3',
                    'max:20',                 
                    'regex:/^[\p{L}\s\'-]+$/u',   
                ],
                'edad'       => 
                [
                    'required',
                    'integer',
                    'min:1',
                    'max:124'
                ],
                'email'      => 
                [
                    'required',
                    'email', 
                    'unique:estudiantes,email,' . $estudiante->id_estudiante . ',id_estudiante',
                ],
                'telefono'   => 
                [
                    'required',
                    'string',
                    'size:10',
                    'regex:/^[0-9]+$/',
                ],
                'id_grupo'   => 
                [
                    'required',
                    'exists:grupos,id_grupo'
                ]
            ]);

        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return redirect()->route('estudiantes.index');
    }
}
