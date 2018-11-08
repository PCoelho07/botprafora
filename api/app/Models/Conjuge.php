<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Conjuge extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'sobrenome', 'idade', 'created_at', 'update_at', 'parceiro_id'
    ];


    public function parceiro() {
        return $this->hasOne('App\Models\Conjuge', 'parceiro_id');
    }

    

}
