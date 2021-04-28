<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class MonograficoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $monografico = DB::table('monograficos')
        ->join('escuelas', 'escuelas.id', 'escuela_id')
        ->join('facultades', 'facultades.id', 'facultad_id')
        ->join('universidades', 'universidades.id', 'universidad_id')
        ->join('recintos', 'recintos.id', 'recinto_id')
        ->where('monograficos.id', $id)
        ->selectRaw('universidades.nombre as nombre_universidad, facultades.nombre as nombre_facultad, 
        escuelas.nombre as nombre_escuela, recintos.nombre as nombre_recinto, tema, titulo_universitario, fecha')
        ->first();
        
        $autores = DB::table('monograficos')
        ->join('monografico_autor', 'monografico_autor.monografico_id', 'monograficos.id')
        ->join('autores', 'monografico_autor.autor_id', 'autores.id')
        ->where('monograficos.id', $id)
        ->selectRaw('nombres, apellidos, matricula')
        ->get();

        $sustentantes = DB::table('monograficos')
        ->join('monografico_sustentante', 'monografico_sustentante.monografico_id', 'monograficos.id')
        ->join('sustentantes', 'monografico_sustentante.sustentante_id', 'sustentantes.id')
        ->where('monograficos.id', $id)
        ->selectRaw('nombres, apellidos')
        ->get();

        return view('monografico_detail', compact('monografico', 'autores', 'sustentantes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
