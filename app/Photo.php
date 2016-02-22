<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Photo extends Model
{
    /**
     * Fillable fields for a Photo.
     *
     * @var array
     */
    protected $fillable = ['name', 'path', 'thumbnail_path'];

    /**
     * Table name override.
     * By default Laravel will try to use the pluralised class name as the table name.
     *
     * @var string
     */
    protected $table = 'flyer_photos';

    /**
     * A photo belongs to a flyer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }

    /**
     * Mutator
     * Set the filename and update the path and thumbnail path.
     *
     * @param $name
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name; // update internal attributes array.

        $this->path = $this->baseDir() . '/' . $name;
        $this->thumbnail_path = $this->baseDir() . '/tn-' . $name;
    }

    /**
     * Return hard-coded base directory.
     *
     * @return string
     */
    public function baseDir()
    {
        return 'img/flyers';
    }
}
