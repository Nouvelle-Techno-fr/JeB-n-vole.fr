<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    private $slugger;

    public function __construct(SluggerInterface $sluggerInterface)
    {

        $this->slugger = $sluggerInterface;
    }

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i <= 10; $i++){
            $categories = new Categories();
            $categories->setName('test ' .$i);
            $categories->setIsActived(true);
            $categories->setColor('color ' .$i);
            //$categories->setParentId(1);
            $categories->setIsActived(true);
            $categories->setSlug($this->slugger->slug($categories->getName())->lower());
            $categories->setDescription('description ' .$i);
            $categories->setPicture('picture ' .$i);
            $manager->persist($categories);
        }

        $manager->flush();
    }
}