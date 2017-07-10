<?php

namespace Impresoras;

use Illuminate\Database\Eloquent\Model;

class Impresora extends Model
{
    //
     protected $table = 'impresoras';
    protected $primaryKey = "idimpresoras";

    public $timestamps = false;

    protected $fillable = [
    	'idmodelo_impresoras',
    	'numeroserie',
    	'ipimpresora',
    	'macimpresora',
    	'fechacompra',
    	'estado',
    	'observacion'
    ];

    protected $guarded = [
    	
    ];
}
