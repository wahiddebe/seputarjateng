<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karesidenan extends Model
{
    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }
}
