<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TikTokStat extends Model
{
    protected $table = 'tiktok_stats';  // juiste tabelnaam invullen

    protected $fillable = [
        'follower_count',
        // voeg hier meer kolommen toe die je wilt invullen
    ];
}