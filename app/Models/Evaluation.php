<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'sujet_id',
        'encadrant_id',
        'note',
        'commentaire',
    ];

    public function sujet()
{
    return $this->belongsTo(SujetPFE::class, 'sujet_id');
}

}
