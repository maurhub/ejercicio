<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remito extends Model
{
    //
    protected $table = 'remitos';
    protected $primaryKey = 'id';
    protected $fillable = [ 'fecha_emision', 'monto_total', 'proveedor_id' ];

    public $timestamps = false;
}
