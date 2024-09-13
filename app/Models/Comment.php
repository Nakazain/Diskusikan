<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'diskusi_id',
        'user_id',
        'username',
        'comment',
    ];
    public function diskusi(){
    return $this->belongsTo(Diskusi::class);
}
}

