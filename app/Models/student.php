<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $attributes = [
        'gender' => 1
    ];

    public function getGenderAttribute($attribute)
    {
        return $this->genderOptions()[$attribute];
    }

    public function teacher()
    {
        return $this->belongsTo(teacher::class);
    }

    public function marks()
    {
        return $this->hasMany(mark::class);
    }

    public function genderOptions()
    {
        return [
            0 => 'Female',
            1 => 'Male'

        ];
    }
}
