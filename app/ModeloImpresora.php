<?php

namespace Impresoras;

use Illuminate\Database\Eloquent\Model;

class ModeloImpresora extends Model
{
    //
    protected $table = 'modelo_impresoras';
    protected $primaryKey = "idmodelo_impresoras";

    public $timestamps = false;

    protected $fillable = [
    	'detalle',
    	'condicion'
    ];

    protected $guarded = [
    	
    ];
}
