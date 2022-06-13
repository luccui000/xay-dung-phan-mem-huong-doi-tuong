<?php

namespace Luccui\Http\Controllers\Api;

use Luccui\Helpers\FileUpload;
use Luccui\Http\Controllers\Admin\BaseController;

class UploadImageController extends BaseController
{
    public function upload()
    {
        $uploadedImage = $this->request->file['upload'];
        if(FileUpload::isImage($uploadedImage)) {
            $imagePath = FileUpload::save($uploadedImage);
        }

        return json_encode([
            'fileName' => $uploadedImage['name'],
            'uploaded' => 1,
            'url' => BASE_URL . $imagePath
        ]);
    }
}
