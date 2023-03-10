<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zip extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id', 'file', 'name'
    ];
    public function images(){
        $this->hasMany(Image::class);
    }


}
