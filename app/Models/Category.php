<?php

namespace App\Models;

use App\Traits\GetAttribute;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use GetAttribute;
    
    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name');

    public function vedios()
    {
        return $this->hasMany(Vedio::class);
    }
    
    public function __construct(array $attributes = [])
    {
    parent::__construct($attributes);
    $this->multiple_attachment = true;
    $this->multiple_attachment_usage = ['default', 'bdf-file'];
    }

}
    