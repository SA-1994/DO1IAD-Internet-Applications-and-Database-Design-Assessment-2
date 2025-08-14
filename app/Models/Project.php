<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; //Importing Carbon for date formatting and manipulation

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'pid'; //Use 'pid' as primary key instead of default 'id'

    protected $fillable = [ //Allow these fields to be mass assigned
        'title',
        'short_description',
        'start_date',
        'end_date',
        'phase',
        'uid',
        'pid',
    ];

    public function user() //Define relationship: each project belongs to one user
    {
        return $this->belongsTo(User::class, 'uid', 'uid');
    }

    public function getFormattedStartDateAttribute() //Format start_date as DD/MM/YYYY
    {
        return Carbon::parse($this->start_date)->format('d/m/Y');
    }
}