<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'status', 'language'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'users_id');
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }
    public function headOfDepartment()
    {
        return $this->belongsTo(User::class, 'head_of_department_id');
    }


}
