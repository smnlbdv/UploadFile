<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Image extends Model
{
    use HasFactory;

    public function zip(){
        return $this->belongsTo(Zip::class);
    }


    protected $fillable = [
        'id',
        'user_id',
        'name',
        'file',
        'type',
        'width',
        'height',
        'group_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function group(){
        return $this->belongsTo(GroupImage::class);
    }

}
