<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Produk extends Model
{

    //
    use SoftDeletes;

    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    public function photos():HasMany
    {
        return $this->hasMany(ProdukImage::class);
    }

    public function keranjang() :HasMany{
        return $this->hasMany(Keranjang::class);
    }
}
