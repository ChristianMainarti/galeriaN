<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Artist extends Model
{
    use HasFactory;

    protected $guarded= ['id'];

    public function getImageUrlAttribute()
    {
        return Storage::temporaryUrl($this->image);
    }
}
