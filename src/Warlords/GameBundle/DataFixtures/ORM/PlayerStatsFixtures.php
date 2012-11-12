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


        $stat0 = new PlayerStats();
        $stat0->setLevel(1);
        $stat0->setExp(0);
        $stat0->setSp(0);
        $stat0->setFame(0);
        $stat0->setLand(100);
        $stat0->setGold(100);
        $stat0->setInfantry(100);
        $stat0->setKnights(100);
        $stat0->setCalvary(100);
        $stat0->setUser($this->getReference('user0'));
        
        $manager->persist($stat0);

        $stat1 = new PlayerStats();
        $stat1->setLevel(1);
        $stat1->setExp(0);
        $stat1->setSp(0);
        $stat1->setFame(0);
        $stat1->setLand(200);
        $stat1->setGold(100);
        $stat1->setInfantry(300);
        $stat1->setKnights(400);
        $stat1->setCalvary(1600);
        $stat1->setUser($this->getReference('user1'));
        
        
        $manager->persist($stat1);

        $stat2 = new PlayerStats();
        $stat2->setLevel(1);
        $stat2->setExp(0);
        $stat2->setSp(0);
        $stat2->setFame(0);
        $stat2->setLand(100);
        $stat2->setGold(600);
        $stat2->setInfantry(1100);
        $stat2->setKnights(200);
        $stat2->setCalvary(400);
        $stat2->setUser($this->getReference('user2'));
        
        $manager->persist($stat2);

        $stat3 = new PlayerStats();
        $stat3->setLevel(1);
        $stat3->setExp(0);
        $stat3->setSp(0);
        $stat3->setFame(0);
        $stat3->setLand(1200);
        $stat3->setGold(1100);
        $stat3->setInfantry(200);
        $stat3->setKnights(600);
        $stat3->setCalvary(400);
        $stat3->setUser($this->getReference('user3'));
        
        
        $manager->persist($stat3);

      
        $manager->flush();
        


    }

    
    public function getOrder()
    {
        return 2;
    }
}
?>
