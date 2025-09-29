<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'cover', 'kategori_id'];

    function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
