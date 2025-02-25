<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitacao extends Model
{
    use HasFactory,  SoftDeletes;

    protected $fillable = ['nome', 'email', 'telefone', 'nif', 'pay', 'valor'];


    // Se necessário, adicione o campo 'deleted_at' ao array de `$dates`
    protected $dates = ['deleted_at'];

}

