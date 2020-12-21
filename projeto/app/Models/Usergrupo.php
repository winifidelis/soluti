<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usergrupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'grupo_id',
    ];

    public function user(){
        //pertence a um usuário
        return $this->belongsTo(User::class);
    }
    public function grupo(){
        //pertence a um usuário
        return $this->belongsTo(Grupo::class);
    }
}
