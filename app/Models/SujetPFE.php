<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SujetPFE extends Model
{
    use HasFactory;
    protected $table = 'sujet_p_f_e_s';

    protected $fillable = ['titre', 'description', 'statut', 'anneeUniversitaire', 'user_id'];

    public function etudiant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rapport()
    {
        return $this->hasOne(Rapport::class, 'sujet_id');
    }
    public function encadrant()
    {
        return $this->belongsTo(User::class, 'encadrant_id');
    }

    public function evaluation()
{
    return $this->hasOne(Evaluation::class, 'sujet_id');
}

    
}
