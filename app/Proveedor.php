<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proveedor extends Model
{
    protected $table = 'proveedor';
    public $primaryKey = 'pvId';
    public $timestamps = false;

    public static function obtenerProveedor()
    {
        return DB::table('proveedor as pv')
            ->select('pv.pvId as pvCod', 'pv.pvRazonS','pv.pvRuc','pv.pvTelefono' ,'pv.pvDireccion'  ,'pv.pvEst')
            ->orderBy('pv.pvId', 'asc')->get();
    }
    public static function getProveedorAct()
    {
        return DB::table('proveedor as pv')
            ->select('pv.pvId as pvCod', DB::raw("concat(pv.pvRuc,'-',pv.pvRazonS) AS pvProv"),
                     'pv.pvTelefono' ,'pv.pvDireccion'  ,'pv.pvEst')
            ->orderBy('pv.pvId', 'asc')
            ->where('pv.pvEst','=',1)->get();
    }
    public static function obtenerProveedorEditar($idprod)
    {
        return DB::table('proveedor as  pv')
            ->select('pv.pvId as pvCod', 'pv.pvRazonS','pv.pvRuc','pv.pvTelefono' ,'pv.pvDireccion'  ,'pv.pvEst')
            ->where('pv.pvId', $idprod)
            ->orderBy('pv.pvId', 'asc')->first();
    }
}
