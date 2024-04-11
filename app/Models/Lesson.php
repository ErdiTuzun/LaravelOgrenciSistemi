<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'credit', 'code'
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }
}

