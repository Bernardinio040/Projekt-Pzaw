<?php

namespace App\Service;

use Symfony\Component\Mime\MimeTypes;

class FileService {
    /** @var string */
    //TODO move it to config
    public const FILES_PATH = "C:\\pzaw-galeria\\test\\Projekt-Pzaw\\galeria_zdjec_symphony\\static";
    public const ENDPOINT_PATH = "/image/";

    /**
     * @param string $base64
     * @return string name of converted file
     */
    public function convertToFile() {

    }
}