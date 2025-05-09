<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function sujet()
    {
        return $this->hasOne(SujetPFE::class, 'user_id');
    }
    public function sujetsEncadres()
    {
        return $this->hasMany(SujetPFE::class, 'encadrant_id');
    }
}
