<?php

namespace App\DataFixtures;

use App\Entity\Associations;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class AssociationsFixtures extends Fixture
{

    private $slugger;

    public function __construct(SluggerInterface $sluggerInterface)
    {
        $this->slugger =  $sluggerInterface;
    }

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i <= 10; $i++){
            $associations = new Associations();
            $associations->setName('test '.$i);
            $associations->setEmail('test'.$i.'@test.fr ');
            $associations->setAddress('adresse '.$i);
            $associations->setZip('1234'.$i);
            $associations->setCity('city '.$i);
            $associations->setIsBanned(false);
            $associations->setIsActived(true);
            $associations->setSlug($this->slugger->slug($associations->getName())->lower());
            $associations->setDescription('description '.$i);
            $associations->setPicture('picture'.$i);
            $associations->setIsDeleted(false);
            $manager->persist($associations);
        }

        $manager->flush();
    }
}
