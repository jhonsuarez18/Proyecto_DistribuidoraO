<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class reAfiliado extends Model
{
    protected $table = 're_afiliados';

    public static function getAfiliadoDni($dni)
    {
        return DB::table('re_afiliados as af')->select('*',
            DB::raw('TIMESTAMPDIFF(year,af.afi_fecnac, now() ) as edad'),
            DB::raw("DATE_FORMAT(af.afi_fecnac,'%d-%m-%Y') AS fecnac"))
            ->join('re_pac_tip_segs as pts', 'pts.afi_DNI', '=', 'af.afi_DNI')
            ->join('re_tip_seguro as ts', 'ts.tSId', '=', 'pts.tSId')
            ->where('af.afi_DNI', '=',$dni)
            ->where('af.afi_estado', '=',0)
            ->first();
    }
}