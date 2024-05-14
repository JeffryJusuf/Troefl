<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;
    
    protected $guarded = ['id', 'user_id'];

    protected $fillable = ['title', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class, 'discussion_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
