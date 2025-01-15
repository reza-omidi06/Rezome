<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyTeam extends Model
{
    protected $fillable=[
        'name_person',
        'name_personـen',
        'job_person',
        'about_person',
        'picture_person',
        'social_person_instagram',
        'social_person_linkedin',
        'social_person_telegram',
        'social_person_X',
        'social_person_facebook',
    ];
    use HasFactory;
}
