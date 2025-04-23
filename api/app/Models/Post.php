<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];

    /**
     * Get the user associated with the Post
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
