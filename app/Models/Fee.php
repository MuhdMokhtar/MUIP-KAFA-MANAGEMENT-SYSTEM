<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'tuition_fee', 'activity_fee', 'total_fee'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
