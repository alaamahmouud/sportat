<?php

namespace App\Models;

use App\Traits\GetAttribute;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
        use GetAttribute;

        protected $table = 'comments';
        public $timestamps = true;
        protected $fillable = array('content' ,'client_id' , 'vedio_id');
    
        public function client()
        {
           return $this->belongsTo(Client::class);
        }

        public function vedio()
        {
           return $this->belongsTo(Vedio::class);
        }
        
        public function __construct(array $attributes = [])
        {
        parent::__construct($attributes);
        $this->multiple_attachment = true;
        $this->multiple_attachment_usage = ['default', 'bdf-file'];
        }
    
    }
    
