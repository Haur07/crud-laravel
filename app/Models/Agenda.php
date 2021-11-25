<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';

    protected $fillable = [
        'data',
        'compromisso',
        'categoria',
        'observacao',
        'usuario'
    ];

    public function usaurio() {
        return $this->belongsTo('App\Agenda\User', 'usuario');
    }
}
