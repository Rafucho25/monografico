<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sustentante;
use Illuminate\Database\QueryException;

class SustentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sustentantes = Sustentante::all();
        return view('user.sustentantes.index', compact('sustentantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.sustentantes.create');
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
        $sustentante = New Sustentante;
        $sustentante->fill($request);
        $sustentante->save();

        return redirect()->route('manage.sustentantes.index')->with('messageSuccess', 'Sustentante Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sustentante = Sustentante::find($id);
        return view('user.sustentantes.show', compact('sustentante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sustentante = Sustentante::find($id);
        return view('user.sustentantes.edit', compact('sustentante'));
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
        $sustentante = Sustentante::find($id);
        $sustentante->fill($request->all());
        $sustentante->save();

        return redirect()->route('manage.sustentantes.index')->with('messageSuccess', 'Sustentante Modificado Correctamente');
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
            $sustentante = Sustentante::find($request->id);
            $sustentante->delete();
    
            return redirect()->route('manage.sustentantes.index')->with('messageSuccess', 'Sustentante Eliminado Correctamente');
            
        } catch (QueryException $th) {
            if($th->getCode() == 23000){
                return redirect()->back()->with('messageDanger', 'No puede eliminar este Sustentante debido a que esta siendo usado en un monografico');
            
            }else{
                return redirect()->back()->with('messageDanger', 'Ha ocurrido un error, por favor trare mas tarde');
            }
        }
    }
}
