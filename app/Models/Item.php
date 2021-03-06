<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function parameters()
    {
        return $this->belongsToMany(Parameter::class,'item_parameters')->withPivot(['data']);;
    }
}
