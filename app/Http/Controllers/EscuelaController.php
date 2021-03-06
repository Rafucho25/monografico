<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escuela;
use Illuminate\Database\QueryException;

class EscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escuelas = Escuela::all();
        return view('user.escuelas.index', compact('escuelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.escuelas.create');
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
        $escuela = New Escuela;
        $escuela->fill($request);
        $escuela->save();

        return redirect()->route('manage.escuelas.index')->with('messageSuccess', 'Escuela Creada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $escuela = Escuela::find($id);
        return view('user.escuelas.show', compact('escuela'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $escuela = Escuela::find($id);
        return view('user.escuelas.edit', compact('escuela'));
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
        $escuela = Escuela::find($id);
        $escuela->fill($request->all());
        $escuela->save();

        return redirect()->route('manage.escuelas.index')->with('messageSuccess', 'Escuela Modificada Correctamente');
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
            $escuela = Escuela::find($request->id);
            $escuela->delete();
    
            return redirect()->route('manage.escuelas.index')->with('messageSuccess', 'Escuela Eliminada Correctamente');
            
        } catch (QueryException $th) {
            if($th->getCode() == 23000){
                return redirect()->back()->with('messageDanger', 'No puede eliminar esta Escuela debido a que esta siendo usada en un monografico');
            
            }else{
                return redirect()->back()->with('messageDanger', 'Ha ocurrido un error, por favor trare mas tarde');
            }
        }
    }
}
