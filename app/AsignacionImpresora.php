<?php

namespace Impresoras;

use Illuminate\Database\Eloquent\Model;

class AsignacionImpresora extends Model
{
    //
     protected $table = 'asignacion_impresoras';
    protected $primaryKey = "idasignacion_impresoras";

    public $timestamps = false;

    protected $fillable = [
        'idareas',
        'idoficinas',
        'idimpresoras',
    	'fechaasignacion'
    ];

    protected $guarded = [
    	
    ];
}
