<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    protected $fillable = ['name','zip','code_insee'];

    public function plages()
    {
        return $this->hasMany(Plage::class, 'zip', 'zip');
    }
}
