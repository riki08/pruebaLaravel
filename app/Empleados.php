<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $fillable = [
        'First_name', 'Last_name', 'Email', 'phone', 'company_id',
    ];
    

    public function companiaModel()
    {
        return $this->belongsTo('App\Companias','company_id');
    }
}
