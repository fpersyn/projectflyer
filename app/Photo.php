<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;


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
     * Placeholder for an uploaded file.
     *
     * @var object
     */
    protected $file;

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
     * Generates the Photo instance attributes from uploaded file.
     *
     * @param UploadedFile $file
     * @return mixed
     */
    public static function fromFile(UploadedFile $file)
    {
        $photo = new static;

        $photo->file = $file;

        return $photo->fill([
            'name' => $photo->fileName(),
            'path' => $photo->filePath(),
            'thumbnail_path' => $photo->thumbnailPath()
        ]);
    }

    /**
     * Generate and return file name.
     *
     * @return string
     */
    public function fileName()
    {
        $name = time() . $this->file->getClientOriginalName();

        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
    }

    /**
     * Generate and return file path.
     *
     * @return string
     */
    public function filePath()
    {
        return $this->baseDir() . '/' . $this->fileName();
    }

    /**
     * Generate and return thumbnail path.
     *
     * @return string
     */
    public function thumbnailPath()
    {
        return $this->baseDir() . '/tn-' . $this->fileName();
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

    /**
     * Moves a Photo to the correct directory and triggers thumbnail creation.
     *
     * @return $this
     */
    public function upload()
    {
        $this->file->move($this->baseDir(), $this->fileName());

        $this->makeThumbnail();

        return $this;
    }

    /**
     * Create a thumbnail for the Photo and store it.
     */
    protected function makeThumbnail()
    {
        Image::make($this->filePath())
            ->fit(200)
            ->save($this->thumbnailPath());
    }
}
