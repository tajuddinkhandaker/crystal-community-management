<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    protected $table = 'announcements';
    protected $guarded = [];
    /**
     * Convert date fields to Carbon
     *
     * @var array
     */
    protected $dates = ['expired_at'];
}
