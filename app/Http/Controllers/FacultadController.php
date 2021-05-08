<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facultad;

class FacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultades = Facultad::all();
        return view('user.facultades.index', compact('facultades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.facultades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->except('_token');
        $facultad = New Facultad;
        $facultad->fill($request);
        $facultad->save();

        return redirect()->route('manage.facultades.index')->with('messageSuccess', 'Facultad Creada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facultad = Facultad::find($id);
        return view('user.facultades.show', compact('facultad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facultad = Facultad::find($id);
        return view('user.facultades.edit', compact('facultad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $facultad = Facultad::find($id);
        $facultad->fill($request->all());
        $facultad->save();

        return redirect()->route('manage.facultades.index')->with('messageSuccess', 'Facultad Modificada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $facultad = Facultad::find($request->id);
        $facultad->delete();

        return redirect()->route('manage.facultades.index')->with('messageSuccess', 'Facultad Eliminada Correctamente');
    }
}
