<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'activity_type',
        'activity_name',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'location',
        'description',
        'status',
    ];
}
