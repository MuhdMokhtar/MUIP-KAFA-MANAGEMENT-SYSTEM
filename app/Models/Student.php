<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'darjah', 'date_of_birth','parent_id'];

    public function fees()
{
    return $this->hasMany(Fee::class);
}

public function parent()
{
    return $this->belongsTo(User::class, 'parent_id');
}

}
