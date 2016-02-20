<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
     * Set base directory for Photo storage.
     *
     * @var string
     */
    protected $baseDir = 'img/flyers';


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
     * Build a new photo instance from a file upload.
     *
     * @param string $name
     * @return static
     */
    public static function named($name)
    {
        return (new static)->saveAs($name);
    }


    /**
     * Generate filenames and paths to store a Photo.
     *
     * @param $name
     * @return $this
     */
    private function saveAs($name)
    {
        $this->name = sprintf("%s-%s", time(), $name);
        $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);

        return $this;
    }


    /**
     * Move Photo to the correct place & trigger thumbnail creation.
     *
     * @param UploadedFile $file
     * @return $this
     */
    public function move(UploadedFile $file)
    {
        $file->move($this->baseDir, $this->name);

        $this->makeThumbnail();

        return $this;
    }


    /**
     * Create a thumbnail for the Photo and store it.
     */
    protected function makeThumbnail()
    {
        Image::make($this->path)
            ->fit(200)
            ->save($this->thumbnail_path);
    }

}
