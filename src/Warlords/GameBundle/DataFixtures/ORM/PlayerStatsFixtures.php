<?php


namespace Warlords\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Warlords\GameBundle\Entity\PlayerStats;

class PlayerStatsFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $manager->persist($this->createPlayerStats('user-0'));
        $manager->persist($this->createPlayerStats('user-1'));
        $manager->persist($this->createPlayerStats('user-2'));
        $manager->persist($this->createPlayerStats('user-3'));
        $manager->persist($this->createPlayerStats('user-4'));
        $manager->persist($this->createPlayerStats('user-5'));
        $manager->persist($this->createPlayerStats('user-6'));
        $manager->persist($this->createPlayerStats('user-7'));
        $manager->persist($this->createPlayerStats('user-8'));
        $manager->persist($this->createPlayerStats('user-9'));
        $manager->persist($this->createPlayerStats('user-10'));
        $manager->persist($this->createPlayerStats('user-11'));
        $manager->persist($this->createPlayerStats('user-12'));
        $manager->persist($this->createPlayerStats('user-13'));
        $manager->persist($this->createPlayerStats('user-14'));
        $manager->persist($this->createPlayerStats('user-15'));
        $manager->flush();
    }

    public function createPlayerStats($reference) {
        $stat0 = new PlayerStats();
        $stat0->setLevel(rand(1, 100));
        $stat0->setExp(rand(1, 10000));
        $stat0->setSp(0);
        $stat0->setFame(rand(1, 100));
        $stat0->setLand(rand(100, 10000));
        $stat0->setGold(rand(100, 1000000));
        $stat0->setInfantry(rand(100, 500));
        $stat0->setKnights(rand(100, 500));
        $stat0->setCalvary(rand(100, 500));
        $stat0->setUser($this->getReference($reference));
        return $stat0;
    }
        
    
    public function getOrder()
    {
        return 2;
    }
}
?>
