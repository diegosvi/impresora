<?php

namespace Impresoras;

use Illuminate\Database\Eloquent\Model;

class ModeloCartucho extends Model
{
    //
    protected $table = 'modelo_cartuchos';
    protected $primaryKey = "idmodelo_cartuchos";

    public $timestamps = false;

    protected $fillable = [
    	'detalle',
    	'condicion'
    ];

    protected $guarded = [
    	
    ];
}
