<?php


namespace Warlords\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Warlords\GameBundle\Entity\SkillList;

class SkillListFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $skill1 = new SkillList();
        $skill1->setName('Fireball');
        $skill1->setBasePower(1000);

        $manager->persist($skill1);
        
        
        $skill2 = new SkillList();
        $skill2->setName('Ice');
        $skill2->setBasePower(780);

        $manager->persist($skill2);

      
        $skill3 = new SkillList();
        $skill3->setName('Whirlwind');
        $skill3->setBasePower(800);

        $manager->persist($skill3);
        
       
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}
?>
