<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\GetAttribute;

class Vedio extends Model
{
    use GetAttribute;
    
    protected $table = 'vedios';
    public $timestamps = true;
    protected $fillable = array('name' ,'slug' , 'duration' ,'des' , 'tag');

    public function category()
    {
       return $this->belongsTo(Category::class);
    }
    
    public function __construct(array $attributes = [])
    {
    parent::__construct($attributes);
    $this->multiple_attachment = true;
    $this->multiple_attachment_usage = ['default', 'bdf-file'];
    }

}
