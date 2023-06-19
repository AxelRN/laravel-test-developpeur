<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plage extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','zip'];

    public function commune()
    {
        return $this->belongsTo(Commune::class, 'zip', 'code_insee');
    }
}
