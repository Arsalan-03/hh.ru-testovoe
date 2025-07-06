<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortLinkClick extends Model
{
    protected $fillable = ['short_link_id', 'ip_address', 'user_agent'];

    //
}
