<?php

namespace App\Controller;

use App\Entity\Album;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class PostAPhoto extends AbstractController
{
    public function __invoke(AddPhotoRequest $request)
    {
        var_dump($request);
    }
}
