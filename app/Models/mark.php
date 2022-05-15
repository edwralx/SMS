<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mark extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $attributes = [
        'term' => 1
    ];

    public function getTermAttribute($attribute)
    {
        return $this->termOptions()[$attribute];
    }

    public function student()
    {
        return $this->belongsTo(student::class);
    }

    public function termOptions()
    {
        return [
            1 => 'First Term',
            2 => 'Second Term',
            3 => 'Third Term',
            4 => 'Fourth Term'

        ];
    }
}
