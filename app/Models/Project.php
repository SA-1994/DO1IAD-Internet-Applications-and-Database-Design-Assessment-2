<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'pid'; // 👈 Tells Laravel to use 'pid' instead of 'id'

    // Each project belongs to one user (the project manager)
    public function user()
    {
        return $this->belongsTo(User::class, 'uid', 'uid');
    }
}