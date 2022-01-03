<?php

namespace App\Models;

use App\Traits\GetAttribute;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{

    use GetAttribute;

    protected $table = 'advertisements';
    public $timestamps = true;
    protected $fillable = array('name', 'is_active', 'type_id');

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->multiple_attachment = true;
        $this->multiple_attachment_usage = ['default', 'bdf-file'];
    }
}
