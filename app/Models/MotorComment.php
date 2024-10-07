<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'motor_id',
        'comment',
    ];

    public function motors(){
        return $this->belongsTo(Motor::class);
    }
}
