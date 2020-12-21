<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userarquivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'arquivo_id',
        'proprietario',
    ];


    public function user(){
        //pertence a um usuário
        return $this->belongsTo(User::class);
    }

    public function arquivo(){
        //pertence a um usuário
        return $this->belongsTo(Arquivo::class);
    }
}
