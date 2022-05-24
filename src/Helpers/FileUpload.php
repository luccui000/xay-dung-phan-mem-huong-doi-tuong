<?php

namespace Luccui\Helpers;

class FileUpload
{
    const MAX_FILE_SIZE = 2097152;
    const ACCEPT_FILE_TYPE = ['jpg', 'jpeg', 'png', 'gif'];
    protected string $filename;
    protected string $extension;
    protected string $path;

    public function setFileName($file, $name = "")
    {
        if(empty($name))
            $name = pathinfo($file, PATHINFO_FILENAME);
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
        return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
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
    public static function move($temp, $folder, $file, $newFilename): static|null
    {
        $cls = new static;
        $cls->setFileName($file, $newFilename);
        $fileName = $cls->getFilename();
        if(!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }
        $cls->path = $folder . DIRECTORY_SEPARATOR . $fileName;
        $absolutePath = BASE_APP . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . $cls->path;
        if(move_uploaded_file($temp, $absolutePath))
            return $cls;
        return null;
    }
 }
