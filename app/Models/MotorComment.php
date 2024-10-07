<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'motor_id',
        'comment',
    ];

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_id');
    }

    public function user() // This relationship should already exist
    {
        return $this->belongsTo(User::class, 'user_id'); // Ensure 'user_id' is the correct foreign key
    }
}
