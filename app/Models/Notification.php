<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'action', 'notifiable_id', 'notifiable_type');


    public function notifiable()
    {
        return $this->morphTo();
    }

    public function clients()
    {
        return $this->morphedByMany('App\Models\Client','notifiable')->withPivot('is_read');
    }

//    public function client()
//    {
//        return $this->belongsToMany('App\Models\Client', 'client_notification', 'notification_id', 'client_id')->withPivot('is_read');
//    }

}
