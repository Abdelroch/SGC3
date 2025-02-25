<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;


class Card extends Model
{
    use HasFactory;
    use SoftDeletes; // Ativa o Soft Delete para este modelo
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
