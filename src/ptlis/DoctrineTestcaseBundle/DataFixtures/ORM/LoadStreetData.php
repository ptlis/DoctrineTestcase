<?php

/** Load example street & house data
 *
 * PHP Version 5.4
 *
 * @copyright   (c) 2013 ptlis
 * @author      Brian Ridley <ptlis@ptlis.net>
 */

namespace ptlis\DoctrineTestcaseBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use ptlis\DoctrineTestcaseBundle\Entity\House;
use ptlis\DoctrineTestcaseBundle\Entity\Street;

/** Load example streets data
 */
class LoadStreetData extends AbstractFixture
{
    /** Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('en_GB');

        $street = new Street();
        $street->setStreetName($faker->streetAddress);

        for ($i = 0; $i < 10; $i++) {
            $house = new House();
            $house
                ->setHouseName($faker->secondaryAddress)
                ->setStreet($street);

            $street->addHouse($house);
        }

        $manager->persist($street);
        $manager->flush();
    }
}
