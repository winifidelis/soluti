<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'nome',
        'tamanho',
        'user_id',
    ];

    public function user(){
        //pertence a um usuário
        return $this->belongsTo(User::class);
    }

    public function userarquivos()
    {
        return $this->hasMany(Userarquivo::class);
    }
}
