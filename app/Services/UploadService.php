<?php

namespace App\Services;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadService {

    public static function upload(UploadedFile $file,$path) {

        $fileName = time()."_".$file->getClientOriginalName();

        $file->move(\public_path().$path, $fileName);

        return $fileName;
    }
}
