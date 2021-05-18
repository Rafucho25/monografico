<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recinto;

class RecintoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recintos = Recinto::all();
        return view('user.recintos.index', compact('recintos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.recintos.create');
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
        $recinto = New Recinto;
        $recinto->fill($request);
        $recinto->save();

        return redirect()->route('manage.recintos.index')->with('messageSuccess', 'Recinto Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recinto = Recinto::find($id);
        return view('user.recintos.show', compact('recinto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recinto = Recinto::find($id);
        return view('user.recintos.edit', compact('recinto'));
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
        $recinto = Recinto::find($id);
        $recinto->fill($request->all());
        $recinto->save();

        return redirect()->route('manage.recintos.index')->with('messageSuccess', 'Recinto Modificado Correctamente');
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
            $recinto = Recinto::find($request->id);
            $recinto->delete();
    
            return redirect()->route('manage.recintos.index')->with('messageSuccess', 'Recinto Eliminado Correctamente');
            
        } catch (QueryException $th) {
            if($th->getCode() == 23000){
                return redirect()->back()->with('messageDanger', 'No puede eliminar este Recinto debido a que esta siendo usada en un monografico');
            
            }else{
                return redirect()->back()->with('messageDanger', 'Ha ocurrido un error, por favor trare mas tarde');
            }
        }
    }
}
