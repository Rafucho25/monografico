<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monografico;
use App\Models\Autor;
use App\Models\Carrera;
use App\Models\Escuela;
use App\Models\Facultad;
use App\Models\Recinto;
use App\Models\Sustentante;
use App\Models\Universidad;
use Str;
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
        $monograficos = DB::table('monograficos')
        ->join('escuelas', 'escuelas.id', 'escuela_id')
        ->join('facultades', 'facultades.id', 'facultad_id')
        ->join('universidades', 'universidades.id', 'universidad_id')
        ->join('recintos', 'recintos.id', 'recinto_id')
        ->join('carreras', 'carreras.id', 'carrera_id')
        ->selectRaw('universidades.nombre as nombre_universidad, facultades.nombre as nombre_facultad, 
        escuelas.nombre as nombre_escuela, recintos.nombre as nombre_recinto, tema,  carreras.nombre as titulo_universitario, 
        monograficos.created_at as created_at, monograficos.id as id')
        ->get();
        return view('user.monograficos.index', compact('monograficos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores = DB::table('autores')->selectRaw("id, concat(nombres, ' ', apellidos, ' - ', matricula) as nombres")->pluck('nombres', 'id');
        $carreras = DB::table('carreras')->pluck('nombre', 'id');
        $escuelas = DB::table('escuelas')->pluck('nombre', 'id');
        $facultades = DB::table('facultades')->pluck('nombre', 'id');
        $recintos = DB::table('recintos')->pluck('nombre', 'id');
        $sustentantes = DB::table('sustentantes')->selectRaw("id, concat(nombres, ' ', apellidos) as nombres")->pluck('nombres', 'id');
        $universidades = DB::table('universidades')->pluck('nombre', 'id');

        return view('user.monograficos.create', compact('autores', 'carreras', 'escuelas', 'facultades', 'recintos', 'sustentantes', 'universidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $autores = explode(',', $request->autores);
        $sustentantes = explode(',', $request->sustentantes);

        $request = $request->except('_token');
        $monografico = New Monografico;
        $monografico->fill($request);
        $monografico->save();

        foreach($autores as $autor){
            DB::table('monografico_autor')->insert([
                ['monografico_id' => $monografico->id, 'autor_id' => $autor],
            ]);
        }

        foreach($sustentantes as $sustentante){
            DB::table('monografico_sustentante')->insert([
                ['monografico_id' => $monografico->id, 'sustentante_id' => $sustentante],
            ]);
        }

        return redirect()->route('manage.monograficos.index')->with('messageSuccess', 'Monografico Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $monografico = Monografico::find($id);
        $carreras = DB::table('carreras')->pluck('nombre', 'id');
        $escuelas = DB::table('escuelas')->pluck('nombre', 'id');
        $facultades = DB::table('facultades')->pluck('nombre', 'id');
        $recintos = DB::table('recintos')->pluck('nombre', 'id');
        $universidades = DB::table('universidades')->pluck('nombre', 'id');

        $autores_monografico = DB::table('monografico_autor')
        ->join('autores', 'monografico_autor.autor_id', 'autores.id')
        ->where('monografico_autor.monografico_id', $id)
        ->selectRaw("autores.id, concat(nombres, ' ', apellidos, ' - ', matricula) as nombres")->get();

        $sustentantes_monografico = DB::table('monografico_sustentante')
        ->join('sustentantes', 'monografico_sustentante.sustentante_id', 'sustentantes.id')
        ->where('monografico_sustentante.monografico_id', $id)
        ->selectRaw("sustentantes.id, concat(nombres, ' ', apellidos) as nombres")->get();

        return view('user.monograficos.show', 
            compact('autores_monografico', 'carreras', 'escuelas', 'facultades', 'recintos', 'sustentantes_monografico', 'universidades', 'monografico')
        );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autores = DB::table('autores')
        ->whereNotIn('id', DB::table('monografico_autor')->where('monografico_id', $id)->pluck('autor_id'))
        ->selectRaw("id, concat(nombres, ' ', apellidos, ' - ', matricula) as nombres")->pluck('nombres', 'id');
        $carreras = DB::table('carreras')->pluck('nombre', 'id');
        $escuelas = DB::table('escuelas')->pluck('nombre', 'id');
        $facultades = DB::table('facultades')->pluck('nombre', 'id');
        $recintos = DB::table('recintos')->pluck('nombre', 'id');
        $sustentantes = DB::table('sustentantes')->selectRaw("id, concat(nombres, ' ', apellidos) as nombres")->pluck('nombres', 'id');
        $universidades = DB::table('universidades')->pluck('nombre', 'id');
        $monografico = Monografico::find($id);

        $autores_monografico = DB::table('monografico_autor')
        ->join('autores', 'monografico_autor.autor_id', 'autores.id')
        ->where('monografico_autor.monografico_id', $id)
        ->selectRaw("autores.id, concat(nombres, ' ', apellidos, ' - ', matricula) as nombres")->get();

        $sustentantes_monografico = DB::table('monografico_sustentante')
        ->join('sustentantes', 'monografico_sustentante.sustentante_id', 'sustentantes.id')
        ->where('monografico_sustentante.monografico_id', $id)
        ->selectRaw("sustentantes.id, concat(nombres, ' ', apellidos) as nombres")->get();


        return view('user.monograficos.edit', 
            compact('autores', 'carreras', 'escuelas', 'facultades', 'recintos', 'sustentantes', 'universidades', 'monografico', 'autores_monografico', 'sustentantes_monografico')
        );
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
        $autores = explode(',', $request->autores);
        $sustentantes = explode(',', $request->sustentantes);

        $monografico = Monografico::find($id);
        $monografico->fill($request->all());
        $monografico->save();

        //Eliminamos los autores y sustentantes para volver a insertarlos
        $autores_monografico = DB::table('monografico_autor')->where('monografico_id', $id)->delete();
        $sustentantes_monografico = DB::table('monografico_sustentante')->where('monografico_id', $id)->delete();

        foreach($autores as $autor){
            DB::table('monografico_autor')->insert([
                ['monografico_id' => $monografico->id, 'autor_id' => $autor],
            ]);
        }

        foreach($sustentantes as $sustentante){
            DB::table('monografico_sustentante')->insert([
                ['monografico_id' => $monografico->id, 'sustentante_id' => $sustentante],
            ]);
        }

        return redirect()->route('manage.monograficos.index')->with('messageSuccess', 'Monografico Modificado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $monografico = Monografico::find($request->id);
        $monografico->delete();

        $autores_monografico = DB::table('monografico_autor')->where('monografico_id', $request->id)->delete();
        $sustentantes_monografico = DB::table('monografico_sustentante')->where('monografico_id', $request->id)->delete();

        return redirect()->route('manage.monograficos.index')->with('messageSuccess', 'Monografico Eliminado Correctamente');
    }
    
    public function detail($id)
    {
        $monografico = DB::table('monograficos')
        ->join('escuelas', 'escuelas.id', 'escuela_id')
        ->join('facultades', 'facultades.id', 'facultad_id')
        ->join('universidades', 'universidades.id', 'universidad_id')
        ->join('recintos', 'recintos.id', 'recinto_id')
        ->join('carreras', 'carreras.id', 'carrera_id')
        ->where('monograficos.id', $id)
        ->selectRaw('universidades.nombre as nombre_universidad, facultades.nombre as nombre_facultad, 
        escuelas.nombre as nombre_escuela, recintos.nombre as nombre_recinto, tema,  carreras.nombre as titulo_universitario, fecha')
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
            
        setlocale(LC_ALL, 'es_DO.UTF-8');
        $fecha = Str::ucfirst(strftime("%B %Y", strtotime($monografico->fecha)));

        return view('monografico_detail', compact('monografico', 'autores', 'sustentantes', 'fecha'));

    }
}
