<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A User owns many Flyers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flyers()
    {
        return $this->hasMany('App\Flyer');
    }

    /**
     * A User can publish a Flyer.
     *
     * @param Flyer $flyer
     */
    public function publish(Flyer $flyer)
    {
        $this->flyers()->save($flyer);
    }
}
