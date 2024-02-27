<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title','user_id', 'photo', 'content'
    ];

    public function User():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
