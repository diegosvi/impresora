<?php

namespace Impresoras;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $table = 'areas';
    protected $primaryKey = "idareas";

    public $timestamps = false;

    protected $fillable = [
    	'detalle',
    	'condicion'
    ];

    protected $guarded = [
    	
    ];
}
