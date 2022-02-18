<?php 

namespace App\Services;

use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class HandleImage
{
    private $slugger;
    private $parameterBag;

    public function __construct (SluggerInterface $slugger, ParameterBagInterface $parameterBag)
    {
        $this->slugger = $slugger;
        $this->parameterBag = $parameterBag;
    }
    
    public function save(UploadedFile $file, object $object)
    {
        $originFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFileName = $this->slugger->slug($originFileName);
        $uniqFileName = $safeFileName . '-' . md5(uniqid()) . '.' . $file->guessExtension();
        $file->move(
            $this->parameterBag->get('app_images_directory'),
            $uniqFileName
        );
        $object->setImage('/uploads/images/' . $uniqFileName);
    }

    public function edit(UploadedFile $file, object $object, string $oldImage)
    {
        $this->save($file, $object);
        $fileOldImage = $this->parameterBag->get('app_images_directory') . '/../..' . $oldImage;
        if (file_exists($fileOldImage))
        {
            unlink($fileOldImage);
        }
    }
}

?>