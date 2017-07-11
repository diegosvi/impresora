<?php

namespace Impresoras;

use Illuminate\Database\Eloquent\Model;

class AsignacionCartucho extends Model
{
    //
    protected $table = 'asignacion_cartuchos';
    protected $primaryKey = "idasignacion_cartuchos";

    public $timestamps = false;

    protected $fillable = [
    	'fechaasignacion'
    ];

    protected $guarded = [
    	
    ];
}
