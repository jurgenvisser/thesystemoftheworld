<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialStat extends Model
{
    protected $table = 'social_stats'; // juiste tabelnaam
    
    protected $fillable = [
        'platform',
        'follower_count',
        'invite_link',
        // andere kolommen als je die hebt
    ];
}