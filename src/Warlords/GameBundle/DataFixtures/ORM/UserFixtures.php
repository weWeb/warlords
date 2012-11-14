<?php


namespace Warlords\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Warlords\GameBundle\Entity\User;


class UserFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $user0 = new User();
        $user0->setUsername('user');
        $user0->setPassword(hash('sha1','userpass'));
        $user0->setIsActive(true);

        
        $manager->persist($user0);

        $user1 = new User();
        $user1->setUsername('yfw1');
        $user1->setPassword(hash('sha1','weweb'));
        $user1->setIsActive(true);

        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('yla288');
        $user2->setPassword(hash('sha1','weweb'));
        $user2->setIsActive(true);

        

        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername('yhw3');
        $user3->setPassword(hash('sha1','weweb'));
        $user3->setIsActive(true);

        $manager->persist($user3);

      
        $manager->flush();
        

        $this->addReference('user-0', $user0);
        $this->addReference('user-1', $user1);
        $this->addReference('user-2', $user2);
        $this->addReference('user-3', $user3);

    }

    
    public function getOrder()
    {
        return 1;
    }
}
?>
