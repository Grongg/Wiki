<?php 

namespace App\Services;

use LibDNS\Records\Types\Char;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class HandleImageService
{
    private $slugger;
    private $parameterBag;

    public function __construct (SluggerInterface $slugger, ParameterBagInterface $parameterBag)
    {
        $this->slugger = $slugger;
        $this->parameterBag = $parameterBag;
    }
    
    public function saveDefault(object $user)
    {
            copy($this->parameterBag->get('app_images_directory') . '/' . 'basics/eminence.png', $this->parameterBag->get('app_images_directory') . '/' . 'basics/eminence1.png');
            $avatar = new UploadedFile($this->parameterBag->get('app_images_directory') . '/' . 'basics/eminence1.png', "eminence1.png");
            $originFileName = pathinfo($avatar->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFileName = $this->slugger->slug($originFileName);
            $uniqFileName = $safeFileName . '-' . md5(uniqid()) . '.' . $avatar->guessExtension();
            rename($this->parameterBag->get('app_images_directory') . '/' . 'basics/' . $safeFileName . '.png', $this->parameterBag->get('app_images_directory') . '/' . $uniqFileName);
            $user->setImage('/uploads/images/' . $uniqFileName);

            copy($this->parameterBag->get('app_images_directory') . '/' . 'basics/symfony.jpeg', $this->parameterBag->get('app_images_directory') . '/' . 'basics/symfony1.jpeg');
            $cover = new UploadedFile($this->parameterBag->get('app_images_directory') . '/' . 'basics/symfony1.jpeg', "symfony1.jpeg");
            $originFileName = pathinfo($cover->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFileName = $this->slugger->slug($originFileName);
            $uniqFileName = $safeFileName . '-' . md5(uniqid()) . '.' . $cover->guessExtension();
            rename($this->parameterBag->get('app_images_directory') . '/' . 'basics/' . $safeFileName . '.jpeg', $this->parameterBag->get('app_images_directory') . '/' . $uniqFileName);
            $user->setCover('/uploads/images/' . $uniqFileName);
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
            //  if ($file->getBasename() === "eminence.png" || $file->getBasename() === "symfony.jpeg")
            //  {
            //     //  copy($file->get)
            //  }
            unlink($fileOldImage);
        }
    }
}

?>