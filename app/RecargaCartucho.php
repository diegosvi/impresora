<?php

namespace Impresoras;

use Illuminate\Database\Eloquent\Model;

class RecargaCartucho extends Model
{
    //
    protected $table = 'recarga_cartuchos';
    protected $primaryKey = "idrecarga_cartuchos";

    public $timestamps = false;

    protected $fillable = [
    	'idcartuchos',
    	'numerorecarga',
    	'fechainiciorecarga',
    	'fechafinrecarga',
    	'contadoriniciorecarga',
    	'contadorfinrecarga',
    	'difcontinifinrecarga',
    	'observacion'
    ];

    protected $guarded = [
    	
    ];
}
