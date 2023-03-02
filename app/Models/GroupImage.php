<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupImage extends Model
{
    use HasFactory;

    public function images(){
        return $this->hasMany(Image::class);
    }

    protected $fillable = [
        'group_name',
        'image_name',
        'zip_id'
    ];
}
