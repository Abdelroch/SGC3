<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessLevel extends Model
{
    use HasFactory, SoftDeletes; // Ativa o Soft Delete para este modelo
    protected $guarded = [];

}
