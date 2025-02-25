<?php

namespace App\Models;
use App\Models\User;
use App\Models\Provincia;
use App\Models\Municipio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provincia extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'userId'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function municipios()
    {
        return $this->hasMany(Municipio::class, 'provinceId');
    }
}
