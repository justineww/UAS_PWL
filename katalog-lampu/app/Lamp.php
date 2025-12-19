<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Lamp extends Model
{
    protected $table = 'lamps';

    protected $fillable = [
        'id_lampu',
        'name',
        'brand',
        'power',
        'type',
        'price',
        'description',
        'poster'
    ];
}
