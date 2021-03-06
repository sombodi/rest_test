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
        return $this->hideNumbers(\Crypt::decrypt($value)); 
    }

    public function getFullTelephoneAttribute($value)
    {
        return \Crypt::decrypt($this->getOriginal('telephone')); 
    }

    public function setTelephoneAttribute($value)
    {
        $this->attributes['telephone'] = \Crypt::encrypt($value);
    }

    protected function hideNumbers($number){
        return str_replace(range(0,9), "*", substr($number, 0, -4)) .  substr($number, -4);
    }
}
