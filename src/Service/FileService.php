<?php

namespace App\Service;

use Symfony\Component\Mime\MimeTypes;
use App\Model\GalleryFile;

class FileService
{
    /** @var string */
    //TODO move it to config
    public const FILES_PATH = "C:\\pzaw-galeria\\test\\Projekt-Pzaw\\galeria_zdjec_symphony\\static";
    //"C:\\pzaw-galeria\\test\\Projekt-Pzaw\\galeria_zdjec_symphony\\static"
    //"C:\\Users\\berna\\Desktop\\Projekt-Pzaw"
    //szkolny pc ^
    public const ENDPOINT_PATH = "/image/";

    private $extensionGuesser;

    public function __construct()
    {
        $this->extensionGuesser = new MimeTypes();
    }


    /**
     * @param string $base64
     * @return GalleryFile name of converted file
     */
    public function convertToFile(string $base64): GalleryFile
    {
        $fileName = $this->generateFileName();
        $filePath = $this->generateFilePath($fileName);

        $file = fopen($filePath, 'wb');
        fwrite($file, base64_decode($base64));
        fclose($file);

        $fileExt = $this->getFileExt($filePath);

        $realFilePath = $filePath . '.' . $fileExt;
        rename($filePath, $realFilePath);

        $fileEndpointPath = self::ENDPOINT_PATH . $fileName . '.' . $fileExt;

        return new GalleryFile($realFilePath, $fileEndpointPath);
    }

    /**
     * @param string $fileName
     * @return string
     */
    private function generateFilePath(string $fileName): string
    {
        return self::FILES_PATH . '/' . $fileName;
    }

    /**
     * @return string
     */
    private function generateFileName(): string
    {
        return uniqid("img_", true);
    }

    /**
     * @param string $filePath
     * @return string
     */
    private function getFileExt(string $filePath): string
    {
        return $this->extensionGuesser->getExtensions($this->extensionGuesser->guessMimeType($filePath))[0];
    }

    public function getContentType(string $filePath): string
    {
        return $this->extensionGuesser->guessMimeType($filePath);
    }
}