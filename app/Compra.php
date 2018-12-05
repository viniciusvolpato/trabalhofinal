<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $dates = ['datai', 'datae'];

    protected $fillable = [

        'problema',
        'situacao',
        'servex',
        'datai',
        'datae',
        'tecnico',
        'id_cliente',
        'id_equipamento',
        'valor'
    ];

    /*public function setDataiAttribute($data){
        $this->attributes['datai'] = Carbon::createFromFormat('d/m/Y', $data);
    }*/

    public function getDataiAttribute($data){
        return $this->asDateTime($data)->format('Y-m-d');
    }

    public function getDataeAttribute($data){
        return $this->asDateTime($data)->format('Y-m-d');
    }
}

