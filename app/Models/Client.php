<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['full_name', 'address', 'phone', 'salon_id'];

    public function autos(): HasMany
    {
        return $this->hasMany(Auto::class);
    }
}
