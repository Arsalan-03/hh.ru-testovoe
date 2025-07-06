<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    protected $fillable = ['user_id', 'original_url', 'short_code'];

    public function clicks()
    {
        return $this->hasMany(\App\Models\ShortLinkClick::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
