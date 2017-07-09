<?php

namespace Impresoras;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    //
    protected $table = 'oficinas';
    protected $primaryKey = "idoficinas";

    public $timestamps = false;

    protected $fillable = [
    	'detalle',
    	'condicion'
    ];

    protected $guarded = [
    	
    ];
}

