<?php

namespace App\Flyers;

use App\Flyer;
use App\Photo;
use App\Thumbnail;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AddPhotoToFlyer
{

    /**
     * The Flyer instance.
     *
     * @var Flyer
     */
    protected $flyer;

    /**
     * The UploadedFile instance.
     *
     * @var UploadedFile
     */
    protected $file;

    /**
     * The Thumbnail instance.
     *
     * @var Thumbnail
     */
    protected $thumbnail;

    /**
     * Create a new AddPhotoToFlyer form object.
     *
     * @param Flyer $flyer
     * @param UploadedFile $file
     * @param Thumbnail $thumbnail
     */
    public function __construct(Flyer $flyer, UploadedFile$file, Thumbnail $thumbnail = null)
    {
        $this->flyer = $flyer;
        $this->file = $file;
        $this->thumbnail = $thumbnail ?: new Thumbnail;
    }

    /**
     * Process the form.
     *
     * @return void
     */
    public function save()
    {
        $photo = $this->flyer->addPhoto($this->makePhoto());

        $this->file->move($photo->baseDir(), $photo->name);

        $this->thumbnail->make($photo->path, $photo->thumbnail_path);

    }

    /**
     * Make a new Photo instance.
     *
     * @return Photo
     */
    private function makePhoto()
    {
        return new Photo(['name' => $this->makeFileName()]);
    }

    /**
     * Make a file name, base on the uploaded file.
     *
     * @return string
     */
    private function makeFileName()
    {
        $name = time() . '-' . $this->file->getClientOriginalName();

        return $name;
    }
}