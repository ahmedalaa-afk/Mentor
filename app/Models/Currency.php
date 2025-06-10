<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table='currencies';
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
