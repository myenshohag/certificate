<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'college_name',
        'college_code',
        'testimonial_text',
    ];
}
