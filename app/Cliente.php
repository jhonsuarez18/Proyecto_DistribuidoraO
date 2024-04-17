<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cliente extends Model
{
    protected $table = 'cliente';
    public $primaryKey = 'clId';
    public $timestamps = false;
    public static function getClientes()
    {
        return $query=DB::table('cliente as cl')
            ->select('cl.clId','pe.peNumeroDoc',
                'cl.clEst','pe.peTelefono','ds.codigo as coddist','dis.codigo',
                DB::raw('LPAD(cl.clId,"5",0) as codcli'),
                DB::raw("DATE_FORMAT(cl.clFecCrea,'%d-%m-%Y') as clFecCrea"),
                DB::raw('concat(pe.peAPPaterno," ",pe.peAPMaterno,", ",pe.pePNombre," ",ifnull(pe.peSNombre,"")) as person'))
            ->join('persona as pe','pe.peId','=','cl.idPersona')
            ->leftjoin('centropoblado_distrito as cpd', 'cpd.cPDId', '=', 'pe.cPDId')
            ->leftjoin('distrito as ds', 'ds.idDistrito', '=', 'cpd.idDistrito')
            ->leftjoin('distrito as dis', 'dis.idDistrito', '=', 'pe.idDistrito')
            ->orderBy('cl.clFecCrea','desc')
            ->get();

    }
    public static function getClienteDni($dni)
    {
        return DB::table('persona as pe')->select('*',
            DB::raw('TIMESTAMPDIFF(year,pe.fecNac, now() ) as edad'))
            ->join('cliente as cl', 'pe.idPersona', '=', 'cl.idPersona')
            ->where('pe.numeroDoc', '=',$dni)
            ->where('cl.clEst', '=',1)
            ->first();
    }
    public static function obtenerCliente($term)
    {
        $query = DB::table('cliente as cl')->select('cl.clId',
            DB::raw('concat(pe.numeroDoc,"-",pe.apPaterno," ",pe.apMaterno,", ",pe.pNombre," ",ifnull(pe.sNombre,"")) as person'))
            ->join('persona as pe','pe.idPersona','=','cl.idPersona')
            ->Where(DB::raw('concat(pe.numeroDoc,"-",pe.apPaterno," ",pe.apMaterno,", ",pe.pNombre," ",ifnull(pe.sNombre,""))'), 'LIKE', "%$term%")
            ->Where('estado', '=', 1)
            ->limit(10000)
            ->get();
        return $query;
    }
}
