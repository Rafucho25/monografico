<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Sentinel;

class SearchController extends Controller
{
    function search(Request $request){

        $filter = $request->filter; 
        $text = $request->search;

        switch ($filter) {
            case 'tema':
                $listmonograficos = DB::table('monograficos')
                ->join('escuelas', 'escuelas.id', 'escuela_id')
                ->join('facultades', 'facultades.id', 'facultad_id')
                ->join('universidades', 'universidades.id', 'universidad_id')
                ->join('carreras', 'carreras.id', 'carrera_id')
                ->where('tema','REGEXP',$text);
                break;

            case 'universidad':
                $listmonograficos = DB::table('monograficos')
                ->join('escuelas', 'escuelas.id', 'escuela_id')
                ->join('facultades', 'facultades.id', 'facultad_id')
                ->join('universidades', 'universidades.id', 'universidad_id')
                ->join('carreras', 'carreras.id', 'carrera_id')
                ->where('universidades.nombre','REGEXP',$text);
                break;

            case 'escuela':
                $listmonograficos = DB::table('monograficos')
                ->join('escuelas', 'escuelas.id', 'escuela_id')
                ->join('facultades', 'facultades.id', 'facultad_id')
                ->join('universidades', 'universidades.id', 'universidad_id')
                ->join('carreras', 'carreras.id', 'carrera_id')
                ->where('escuelas.nombre','REGEXP',$text);
                break;

            case 'facultad':
                $listmonograficos = DB::table('monograficos')
                ->join('escuelas', 'escuelas.id', 'escuela_id')
                ->join('facultades', 'facultades.id', 'facultad_id')
                ->join('universidades', 'universidades.id', 'universidad_id')
                ->join('carreras', 'carreras.id', 'carrera_id')
                ->where('facultades.nombre','REGEXP',$text);
                break;

            default:
                $listmonograficos = DB::table('monograficos')
                ->join('escuelas', 'escuelas.id', 'escuela_id')
                ->join('facultades', 'facultades.id', 'facultad_id')
                ->join('universidades', 'universidades.id', 'universidad_id')
                ->join('carreras', 'carreras.id', 'carrera_id');
                break;
        }
        $listmonograficos = 
        $listmonograficos->selectRaw('universidades.nombre as nombre_universidad, facultades.nombre as nombre_facultad, 
        escuelas.nombre as nombre_escuela, tema, carreras.nombre as titulo_universitario, fecha, monograficos.id as id')
        ->paginate(2);
        return view('search',['list' => $listmonograficos,'filter' => $filter, 'text' => $text]);
    }
}
