<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companias extends Model
{
    protected $fillable = [
        'Name', 'Email', 'logo', 'Website',
    ];

    public function empleadoModel()
    {
        return $this->belongsTo('App\Empleados','company_id');
    }
}
