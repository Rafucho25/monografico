<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universidad;
use App\Models\Recinto;
use App\Models\Facultad;
use App\Models\Escuela;
use App\Models\Carrera;
use App\Models\Autor;
use App\Models\Sustentante;
use App\Models\Monografico;

class ManageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $cantidadUniversidades = Universidad::all()->count();
        $cantidadRecintos = Recinto::all()->count();
        $cantidadFacultades = Facultad::all()->count();
        $cantidadEscuelas = Escuela::all()->count();
        $cantidadCarreras = Carrera::all()->count();
        $cantidadAutores = Autor::all()->count();
        $cantidadSustentantes = Sustentante::all()->count();
        $cantidadMonograficos = Monografico::all()->count();
        return view('user.index', compact('cantidadUniversidades', 'cantidadRecintos', 'cantidadFacultades', 'cantidadEscuelas', 'cantidadCarreras',
        'cantidadAutores', 'cantidadSustentantes', 'cantidadMonograficos' ));
    }
}
