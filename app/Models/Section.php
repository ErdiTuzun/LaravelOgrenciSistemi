<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'status', 'language'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'users_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_section');
    }
    public function headOfDepartment()
    {
        return $this->belongsTo(User::class, 'head_of_department_id');
    }


}
