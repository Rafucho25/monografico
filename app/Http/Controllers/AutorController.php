<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use Illuminate\Database\QueryException;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autor::all();
        return view('user.autores.index', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.autores.create');
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
        $autor = New Autor;
        $autor->fill($request);
        $autor->save();

        return redirect()->route('manage.autores.index')->with('messageSuccess', 'Autor Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $autor = Autor::find($id);
        return view('user.autores.show', compact('autor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autor = Autor::find($id);
        return view('user.autores.edit', compact('autor'));
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
        $autor = Autor::find($id);
        $autor->fill($request->all());
        $autor->save();

        return redirect()->route('manage.autores.index')->with('messageSuccess', 'Autor Modificado Correctamente');
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
            $autor = Autor::find($request->id);
            $autor->delete();
    
            return redirect()->route('manage.autores.index')->with('messageSuccess', 'Autor Eliminado Correctamente');
            
        } catch (QueryException $th) {
            if($th->getCode() == 23000){
                return redirect()->back()->with('messageDanger', 'No puede eliminar este Autor debido a que esta siendo usado en un monografico');
            
            }else{
                return redirect()->back()->with('messageDanger', 'Ha ocurrido un error, por favor trare mas tarde');
            }
        }
    }
}
