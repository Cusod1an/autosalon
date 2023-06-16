<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Salon extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'address', 'phone'];

    public function autos(): HasMany
    {
        return $this->hasMany(Auto::class);
    }
}
