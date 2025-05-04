<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function etudiant()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
