<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdukImage extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($produkPhoto)
        {
            Storage::disk('public')->delete($produkPhoto->path);
        });
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class);
    }
}
