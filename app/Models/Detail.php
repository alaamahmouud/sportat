<?php

namespace App\Models;

use App\Traits\GetAttribute;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //


    use GetAttribute;

    protected $table = 'details';
    public $timestamps = true;
    protected $fillable = array('name', 'service_id');

    public function details()
    {
        return $this->belongsTo(Service::class,'service_id');
    }


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->multiple_attachment = true;
        $this->multiple_attachment_usage = ['default', 'bdf-file'];
    }
}
