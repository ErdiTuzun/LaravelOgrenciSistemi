<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded;

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function sections() {
        return $this->belongsToMany(Section::class, 'lesson_section');
    }
}

