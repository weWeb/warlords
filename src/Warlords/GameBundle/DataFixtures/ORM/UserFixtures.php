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
        $user0->setUsername('username');
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

        $user4 = new User();
        $user4->setUsername('username4');
        $user4->setPlainPassword('password');
        $user4->setEmail('user4@warlords.com');
        $user4->setIsActive(false);
        $user4->setEnabled(true); 
        $manager->persist($user4);

        $user5 = new User();
        $user5->setUsername('username5');
        $user5->setPlainPassword('password');
        $user5->setEmail('user5@warlords.com');
        $user5->setIsActive(false);
        $user5->setEnabled(true); 
        $manager->persist($user5);
      
        $user6 = new User();
        $user6->setUsername('username6');
        $user6->setPlainPassword('password');
        $user6->setEmail('user6@warlords.com');
        $user6->setIsActive(false);
        $user6->setEnabled(false); 
        $manager->persist($user6);

        $user7 = new User();
        $user7->setUsername('username7');
        $user7->setPlainPassword('password');
        $user7->setEmail('user7@warlords.com');
        $user7->setIsActive(false);
        $user7->setEnabled(true); 
        $manager->persist($user7);

        $user8 = new User();
        $user8->setUsername('username8');
        $user8->setPlainPassword('password');
        $user8->setEmail('user8@warlords.com');
        $user8->setIsActive(false);
        $user8->setEnabled(true); 
        $manager->persist($user8);

        $user9 = new User();
        $user9->setUsername('username9');
        $user9->setPlainPassword('password');
        $user9->setEmail('user9@warlords.com');
        $user9->setIsActive(false);
        $user9->setEnabled(true); 
        $manager->persist($user9);

        $user10 = new User();
        $user10->setUsername('username10');
        $user10->setPlainPassword('password');
        $user10->setEmail('user10@warlords.com');
        $user10->setIsActive(false);
        $user10->setEnabled(true); 
        $manager->persist($user10);

        $user11 = new user();
        $user11->setUsername('username11');
        $user11->setPlainPassword('password');
        $user11->setEmail('user11@warlords.com');
        $user11->setIsActive(false);
        $user11->setEnabled(true); 
        $manager->persist($user11);

        $user12 = new user();
        $user12->setUsername('username12');
        $user12->setPlainPassword('password');
        $user12->setEmail('user12@warlords.com');
        $user12->setIsActive(false);
        $user12->setEnabled(true); 
        $manager->persist($user12);

        $user13 = new user();
        $user13->setUsername('username13');
        $user13->setPlainPassword('password');
        $user13->setEmail('user13@warlords.com');
        $user13->setIsActive(false);
        $user13->setEnabled(true); 
        $manager->persist($user13);

        $user14 = new user();
        $user14->setUsername('username14');
        $user14->setPlainPassword('password');
        $user14->setEmail('user14@warlords.com');
        $user14->setIsActive(false);
        $user14->setEnabled(false); 
        $manager->persist($user14);

        $user15 = new user();
        $user15->setUsername('username15');
        $user15->setPlainPassword('password');
        $user15->setEmail('user15@warlords.com');
        $user15->setIsActive(false);
        $user15->setEnabled(true); 
        $manager->persist($user15);

        $manager->flush();

        $this->addReference('user-0', $user0);
        $this->addReference('user-1', $user1);
        $this->addReference('user-2', $user2);
        $this->addReference('user-3', $user3);
        $this->addReference('user-4', $user4);
        $this->addReference('user-5', $user5);
        $this->addReference('user-6', $user6);
        $this->addReference('user-7', $user7);
        $this->addReference('user-8', $user8);
        $this->addReference('user-9', $user9);
        $this->addReference('user-10', $user10);
        $this->addReference('user-11', $user11);
        $this->addReference('user-12', $user12);
        $this->addReference('user-13', $user13);
        $this->addReference('user-14', $user14);
        $this->addReference('user-15', $user15);
    }
   
    public function getOrder()
    {
        return 1;
    }
}
?>
