<?php

namespace Impresoras;

use Illuminate\Database\Eloquent\Model;

class Impresion extends Model
{
    //
     protected $table = 'impresions';
    protected $primaryKey = "idimpresions";

    public $timestamps = false;

    protected $fillable = [
    	'idimpresoras',
    	'fechainicioimpresion',
    	'fechafinimpresion',
    	'contadorinicioimpresion',
    	'contadorfinimpresion',
    	'difconinifinimpresion',
    	'observacion'
    ];

    protected $guarded = [
    	
    ];
}
