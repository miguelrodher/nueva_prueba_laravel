<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semestre;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semestres = Semestre::all();
        return view('semestres.index', compact('semestres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semestres.create');
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
                'semestre' => 
                [
                    'required',
                    'string',
                    'min:5',
                    'max:15',                 
                    'regex:/^[A-Z][a-z]+$/',   
                    'unique:semestres,semestre',  
                ],
            ]);

        Semestre::create($request->all());

        return redirect()->route('semestres.index');
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
    public function edit(Semestre $semestre)
    {
        return view('semestres.edit', compact('semestre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semestre $semestre)
    {
        $request->validate(
            [
                'semestre' => 
                [
                    'required',
                    'string',
                    'min:5',
                    'max:15',
                    'regex:/^[A-Z][a-z]+$/', 
                    'unique:semestres,semestre,' . $semestre->id_semestre . ',id_semestre',
                ],
            ]);

        $semestre->update($request->all());

        return redirect()->route('semestres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semestre $semestre)
    {
        $semestre->delete();
        return redirect()->route('semestres.index');
    }
}
