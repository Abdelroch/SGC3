<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Provincia;
use App\Models\User;

class Municipio extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'provinceId'];
    protected $guarded = [];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'provinceId');
    }
}
