<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Category;
use App\Entity\Product;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // ------ categories ------
        $catDefault = new Category();
        $catDefault->setName('(default)');

        $catSmall = new Category();
        $catSmall->setName('small items');

        $catLarge = new Category();
        $catLarge->setName('large items');

        $manager->persist($catDefault);
        $manager->persist($catSmall);
        $manager->persist($catLarge);
        
        // ------- product ----------
        $p1 = new Product();
        $p1->setDescription('hammer');
        $p1->setPrice(9.99);
        $p1->setImage('hammer.png');
        $p1->setCategory($catSmall);

        $manager->persist($p1);

        $manager->flush();
    }
}
