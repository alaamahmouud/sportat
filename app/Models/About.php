<?php

namespace App\Models;

use App\Traits\GetAttribute;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //

    use GetAttribute;

    protected $table = 'abouts';
    public $timestamps = true;
    protected $fillable = array('content');



    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->multiple_attachment = true;
        $this->multiple_attachment_usage = ['default', 'bdf-file'];
    }
}
