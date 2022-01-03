<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifiables extends Model 
{

    protected $table = 'notifiables';
    public $timestamps = true;
    protected $fillable = array('notification_id', 'is_read', 'notifiable_type', 'notifiable_id');
    public function clients()
    {
        return $this->belongsToMany('App\Models\Client')->withPivot('is_read');
    }
}