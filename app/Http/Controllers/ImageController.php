<?php
namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{

    public $images_path = "assets/images";

    function __construct()
    {
        $this->images_path = config('definitions.images_path');
    }

    public function getImageThumbnail($path, $width, $height, $type = "fit")
    {
        if (is_null($width) && is_null($height)) {
            return url("{$this->images_path}/" . ltrim($path, "/"));
        }

        if (File::exists(public_path("{$this->images_path}/thumbs/" . "{$width}x{$height}/" . ltrim($path, "/")))) {
            return url("{$this->images_path}/thumbs/" . "{$width}x{$height}/" . ltrim($path, "/"));
        }

        if (!File::exists(public_path("{$this->images_path}/" . ltrim($path, "/")))) {
            //return $this->getImageThumbnail("error/no-image.png", $width, $height, $type);
            return "http://placehold.it/{$width}x{$height}";
        }

        $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png'];
        $contentType = mime_content_type("{$this->images_path}/" . ltrim($path, "/"));

        if (in_array($contentType, $allowedMimeTypes) && file_exists(public_path("{$this->images_path}/" . ltrim($path, "/")))) {

            $image = Image::make(public_path("{$this->images_path}/" . ltrim($path, "/")));

            switch ($type) {
                case "fit": {
                    $image->fit($width, $height, function ($constraint) {
                        $constraint->upsize();
                    });
                    break;
                }
                case "resize": {
                    $image->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            $parts = explode("/", ltrim($path, "/"));
            array_pop($parts);
            $dir_path = implode("/", $parts);

            if (!File::exists(public_path("{$this->images_path}/thumbs/" . "{$width}x{$height}/" . $dir_path))) {
                File::makeDirectory(public_path("{$this->images_path}/thumbs/" . "{$width}x{$height}/" . $dir_path), 0775, true);
            }
            $image->save(public_path("{$this->images_path}/thumbs/" . "{$width}x{$height}/" . ltrim($path, "/")));
            return url("{$this->images_path}/thumbs/" . "{$width}x{$height}/" . ltrim($path, "/"));
        }
    }
}