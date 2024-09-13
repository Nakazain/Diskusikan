<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
