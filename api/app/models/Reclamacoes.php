<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Reclamacoes extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao', 'reclamante', 'reclamado', 'created_at', 'updated_at'
    ];

    public function reclamante() {
        return $this->belongsTo('App\Conjuge', 'reclamante');
    }

    public function reclamado() {
        return $this->belongsTo('App\Conjuge', 'reclamado');
    }

}
