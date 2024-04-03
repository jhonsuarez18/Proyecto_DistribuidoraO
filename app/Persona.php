<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Persona extends Model
{
    protected $table = 'persona';
    public $primaryKey = 'idPersona';
    public $timestamps = false;

    public static function validarDni($dni)
    {
        $query = DB::table('persona as u')->select(DB::raw('count(numeroDoc) as cant'))
            ->where('numeroDoc','=',$dni)
            ->get();
        return $query;
    }
    static function obtenerPersonaTermino($term){
        $query = DB::table('persona as p')
            ->select('p.idPersona as idp', DB::raw('concat(p.numeroDoc," || ",p.apPaterno," ",p.apMaterno,", ",p.pNombre," ",ifnull(p.sNombre,"")) as nombre'),'p.numeroDoc')
            ->Where(DB::raw('concat(p.numeroDoc,"||",p.apPaterno," ",p.apMaterno,", ",p.pNombre," ",ifnull(p.sNombre,""))'), 'LIKE', "%$term%")
            ->where('p.estado','=',1)
            ->limit(10000)
            ->get();
        return $query;
    }
    /*static function buscarPersonaDni($dni)
    {
        $query = DB::table('persona as pe')
            ->select('ds.idProvincia','pv.idDepartamento', 'pe.idPersona', 'pe.idDistrito', 'pe.pNombre',
                DB::raw('IFNULL(pe.sNombre,\' \') as sNombre'), 'pe.apPaterno', 'pe.apMaterno', 'pe.numeroDoc',
                'pe.tipoDoc', 'pe.direccion', 'pe.referencia', 'pe.fecNac', 'pe.telefono')
            ->join('distrito as ds', 'ds.idDistrito', '=', 'pe.idDistrito')
            ->join('provincia as pv', 'pv.idProvincia', '=', 'ds.idProvincia')
            ->join('departamento as dp', 'dp.idDepartamento', '=', 'pv.idDepartamento')
            ->where('pe.numeroDoc', '=', $dni)
            ->first();
        return $query;
    }*/
    static function buscarPersonaDni($dni)
    {
        $query = DB::table('persona as pe')
            ->select('pe.idPersona', 'cpd.idDistrito', 'pe.pNombre',
                DB::raw('case
                        when pe.idDistrito is null then ds.idDistrito
                        when pe.cPDId is null then dis.idDistrito
                        end distritoid
                        '),
                DB::raw('case
                        when pe.cPDId is null then prov.idProvincia
                        when pe.idDistrito is null then pv.idProvincia
                        end provinciaid
                        '),
                DB::raw('case
                        when pe.cPDId is null then prov.idDepartamento
                        when pe.idDistrito is null then pv.idDepartamento
                        end departamentoid
                        '),
                DB::raw('IFNULL(pe.sNombre,\' \') as sNombre'), 'pe.apPaterno', 'pe.apMaterno', 'pe.numeroDoc',
                'pe.tipoDoc', 'pe.direccion', 'pe.referencia', 'pe.fecNac', 'pe.telefono','pe.cPDId','cp.idCentroPoblado',
                'cp.Descripcion as centrop','pe.idDistrito as dist','prov.idProvincia as provin','dep.idDepartamento as depa')
            ->leftjoin('centropoblado_distrito as cpd', 'cpd.cPDId', '=', 'pe.cPDId')
            ->leftjoin('centropoblado as cp', 'cp.idCentroPoblado', '=', 'cpd.idCentroPoblado')
            ->leftjoin('distrito as ds', 'ds.idDistrito', '=', 'cpd.idDistrito')
            ->leftjoin('provincia as pv', 'pv.idProvincia', '=', 'ds.idProvincia')
            ->leftjoin('distrito as dis', 'dis.idDistrito', '=', 'pe.idDistrito')
            ->leftjoin('provincia as prov', 'prov.idProvincia', '=', 'dis.idProvincia')
            ->leftjoin('departamento as dep', 'dep.idDepartamento', '=', 'prov.idDepartamento')
            ->where('pe.numeroDoc', '=', $dni)
            ->first();
        return $query;
    }

}
