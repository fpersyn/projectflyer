<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    // Table name override
    // by default Laravel will try to use the pluralised class name as the table name
    protected $table = 'flyer_photos';

    protected $fillable = ['path'];

    /**
     * A photo belongs to a flyer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }
}
