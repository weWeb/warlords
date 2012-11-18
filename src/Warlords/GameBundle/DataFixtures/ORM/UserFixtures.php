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
        $user = 'user';
        $user0->setUsername('user');
        $user0->setPlainPassword('userpass');
        $user0->setEmail('user@warlords.com');
        $user0->setIsActive(true);
        $user0->setEnabled(true);

        
        $manager->persist($user0);

        $user1 = new User();
        $user1->setUsername('yfw1');
        $user1->setPlainPassword('weweb');
        $user1->setEmail('yfw1@warlords.com');
        $user1->setIsActive(true);
        $user1->setEnabled(true);
        
        
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('yla288');
        $user2->setPlainPassword('weweb');
        $user2->setEmail('yla228@warlords.com');
        $user2->setIsActive(true);
        $user2->setEnabled(true);

        

        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername('yhw3');
        $user3->setPlainPassword('weweb');
        $user3->setEmail('yhw3@warlords.com');
        $user3->setIsActive(true);
        $user3->setEnabled(true);
        

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
