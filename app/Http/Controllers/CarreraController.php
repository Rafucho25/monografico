<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use Illuminate\Database\QueryException;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::all();
        return view('user.carreras.index', compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.carreras.create');
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
        $carrera = New Carrera;
        $carrera->fill($request);
        $carrera->save();

        return redirect()->route('manage.carreras.index')->with('messageSuccess', 'Carrera Creada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrera = Carrera::find($id);
        return view('user.carreras.show', compact('carrera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrera = Carrera::find($id);
        return view('user.carreras.edit', compact('carrera'));
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
        $carrera = Carrera::find($id);
        $carrera->fill($request->all());
        $carrera->save();

        return redirect()->route('manage.carreras.index')->with('messageSuccess', 'Carrera Modificada Correctamente');
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
        try {
            $carrera = Carrera::find($request->id);
            $carrera->delete();
    
            return redirect()->route('manage.carreras.index')->with('messageSuccess', 'Carrera Eliminada Correctamente');
            
        } catch (QueryException $th) {
            if($th->getCode() == 23000){
                return redirect()->back()->with('messageDanger', 'No puede eliminar esta Carrera debido a que esta siendo usada en un monografico');
            
            }else{
                return redirect()->back()->with('messageDanger', 'Ha ocurrido un error, por favor trare mas tarde');
            }
        }
    }
}
