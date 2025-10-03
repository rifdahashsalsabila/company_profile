<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
   protected $fillable = ['name'];

    // Relasi: 1 kategori punya banyak blog
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'kategori_id');
    }
}
