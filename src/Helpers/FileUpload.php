<?php

namespace Luccui\Helpers;

class FileUpload
{
    const MAX_FILE_SIZE = 2097152;
    const ACCEPT_FILE_TYPE = ['jpg', 'jpeg', 'png', 'gif'];
    protected string $filename;
    protected string $extension;
    protected string $path = "";

    public function setFileName($file, $name = null)
    {
        if(is_null($name))
            $name = pathinfo($file['name'], PATHINFO_FILENAME);
        $name = strtolower(str_replace(["-", ""], "", $name));
        $hash = md5(microtime());
        $ext = $this->getExtension($file);
        $this->filename = $name . "_" . $hash . "." . $ext;
    }
    public function getFilename(): string
    {
        return $this->filename;
    }
    public function getExtension($file): string
    {
        return $this->extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    }
    public function getPath(): string
    {
        return $this->path;
    }
    public static function fileSize($file): bool
    {
        return $file > FileUpload::MAX_FILE_SIZE;
    }
    public static function isImage($file): bool
    {
        $cls = new static;
        $ext = $cls->getExtension($file);
        return in_array(strtolower($ext), FileUpload::ACCEPT_FILE_TYPE);
    }
    public static function move($temp, $folder, $file, $newFilename = null): string|null
    {
        $cls = new static;
        $cls->setFileName($file, $newFilename);
        $fileName = $cls->getFilename();
        if(!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }
        $cls->path = $folder . DIRECTORY_SEPARATOR . $fileName;
        $relativePath = "public" . DIRECTORY_SEPARATOR . $cls->path;
        $absolutePath = BASE_APP . $relativePath;

        if(move_uploaded_file($temp, $absolutePath))
            return $relativePath;
        return null;
    }
    public static function save($file, $folder = "uploads"): string|null
    {
        return static::move($file['tmp_name'], $folder, $file);
    }
 }
