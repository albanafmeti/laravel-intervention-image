<?php


function getThumbnail($img_path, $width, $height, $type = "fit")
{
    return app('App\Http\Controllers\ImageController')->getImageThumbnail($img_path, $width, $height, $type);
}