<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'motor_id',
        'image',
        'name',
        'description'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(MotorComment::class, 'motor_id'); // Specify the foreign key if necessary
    }
}
