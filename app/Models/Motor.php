<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'name',
        'description'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function motors()
    {
        return $this->hasMany(MotorComment::class);
    }
}
