<?php

namespace App\DataFixtures;

use App\Entity\Offers;
use DateTime;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class OffersFixtures extends Fixture
{
    private $slugger;

    public function __construct(SluggerInterface $sluggerInterface)
    {

        $this->slugger = $sluggerInterface;
    }

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i <= 10; $i++){
            $offers = new Offers();
            $offers->setTitle('titre ' .$i);
            $offers->setAddress('adress ' .$i);
            $offers->setZip(1);
            $offers->setCity('city ' .$i);
            $offers->setLongitude(0.1);
            $offers->setLatitude(0.2);
            $offers->setIsPublished(true);
            $offers->setIsActived(true);
            $offers->setIsUrgent(true);
            $offers->setIsDeleted(false);
            $offers->setStatus(true);
            $offers->setDateStart(new DateTimeImmutable());
            $offers->setDateEnd(new DateTime());
            $offers->setFile('file ' .$i);
            $offers->setRecommended(true);
            $offers->setContactExternalName('contactExternal ' .$i);
            $offers->setContactExternalEmail('externalEmail ' .$i);
            $offers->setContactExternalTel('externalContactTel' .$i);
            $offers->setSlug($this->slugger->slug($offers->getTitle())->lower());
            $offers->setDescription('description ' .$i);
            $manager->persist($offers);
        }

        $manager->flush();
    }
}