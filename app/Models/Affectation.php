<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    protected $table = 'affectations';

    protected $fillable = [
        'sujet_id',
        'encadrant_id',
    ];

    public function sujet()
    {
        return $this->belongsTo(SujetPFE::class, 'sujet_id');
    }

    public function encadrant()
    {
        return $this->belongsTo(User::class, 'encadrant_id');
    }
}
