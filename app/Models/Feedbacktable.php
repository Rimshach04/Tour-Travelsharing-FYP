<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedbacktable extends Model
{
    protected $table = 'feedbacktable';
    protected $fillable = [
        // 'user_id',
        'user_id',
        'name',
        'rating',
        'message'
    ];
}
