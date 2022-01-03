<?php

namespace App\Models;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;


class Client extends Authenticatable
{
    use HasApiTokens;
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array(
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        );

    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }

}
