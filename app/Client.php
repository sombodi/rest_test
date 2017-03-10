<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'telephone', 'client_data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'client_data' => 'array',
    ];


    public function getTelephoneAttribute($value)
    {
    }

    public function setTelephoneAttribute($value)
    {
        \Crypt::encrypt($value);
    }

        return str_replace(range(0,9), "*", substr($ccNum, 0, -4)) .  substr($ccNum, -4);
    }
}
