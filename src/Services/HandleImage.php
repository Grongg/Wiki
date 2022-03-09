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
    
    public function save(UploadedFile $file, object $object, bool $set)
    {
        $originFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFileName = $this->slugger->slug($originFileName);
        $uniqFileName = $safeFileName . '-' . md5(uniqid()) . '.' . $file->guessExtension();
        $file->move(
            $this->parameterBag->get('app_images_directory'),
            $uniqFileName
        );
        if ($set)
            $object->setImage('/uploads/images/' . $uniqFileName);
        else
            $object->setCover('/uploads/images/' . $uniqFileName);
    }

    public function prepEdit($user, $form)
    {
            $oldAvatar = $user->getImage();
            $oldCover = $user->getCover();
            /** @var UploadedFile $avatarFile */
            $avatarFile = $form->get('avatarFile')->getData();
            /** @var UploadedFile $coverFile */
            $coverFile = $form->get('coverFile')->getData();
            if ($avatarFile)
                $this->edit($avatarFile, $user, $oldAvatar, true);
            if ($coverFile)
                $this->edit($coverFile, $user, $oldCover, false);
    }

    public function edit(UploadedFile $file, object $object, string $oldImage, bool $typeSet)
    {
        $this->save($file, $object, $typeSet);
        $fileOldImage = $this->parameterBag->get('app_images_directory') . '/../..' . $oldImage;
        if (file_exists($fileOldImage))
        {
            unlink($fileOldImage);
        }
    }
}

?>