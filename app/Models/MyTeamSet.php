<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyTeamSet extends Model
{
    use HasFactory;
    protected $fillable=[
        'my_team_top_head',
        'my_team_top_head_color',
        'my_team_head',
        'my_team_head_color',
        'my_team_bg_color',
        'my_team_bg_image',
        'my_team_background_attachment',
    ];
}
