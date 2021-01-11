<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    public function karesidenan()
    {
        return $this->belongsTo(Karesidenan::class);
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }
}
