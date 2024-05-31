<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function scopeWithAnswers($query)
    {
        return $query->with('answers');
    }
}
