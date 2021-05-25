<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //protected $gaurded = [];

    protected $fillable = [
        'name',
        'body',
        'user_id',
        'image',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
