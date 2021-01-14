<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use Searchable;

    public function karesidenan()
    {
        return $this->belongsTo(Karesidenan::class);
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
