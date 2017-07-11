<?php

namespace Impresoras;

use Illuminate\Database\Eloquent\Model;

class Cartucho extends Model
{
    //
     protected $table = 'cartuchos';
    protected $primaryKey = "idcartuchos";

    public $timestamps = false;

    protected $fillable = [
    	'idmodelo_cartuchos',
    	'codigointerno',
    	'contadorinicialrecarga',
    	'fechacompra',
    	'numerofactura',
    	'estado',
    	'observacion'
    ];

    protected $guarded = [
    	
    ];
}
