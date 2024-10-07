<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'community_id',
        'comment',
    ];

    public function communities(){
        return $this->belongsTo(Community::class, 'community_id');
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
}
