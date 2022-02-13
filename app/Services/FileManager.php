<?php


namespace App\Services;


class FileManager
{
    public function fileUpload($file)
    {
        $profileImage = $file;
        $profileImageSaveAsName = time()  . "file." . $profileImage->getClientOriginalExtension();
        $upload_path = 'books/';
        $profile_image_url = $profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        return $profile_image_url;
    }
}
