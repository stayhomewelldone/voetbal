<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file_path',
        'is_favorite',
        'created_at',
        'updated_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


