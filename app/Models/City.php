<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'governorate_id', 'show');

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function advertisers()
    {
        return $this->hasMany('App\Models\Advertiser');
    }

}
