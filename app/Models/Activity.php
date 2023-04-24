<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_name',
        'date_started',
        'date_ended',
        'location',
        'link',
        'description',      
        'image1',
        'image2',
        'image3'
    ];
}
