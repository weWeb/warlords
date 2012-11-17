<?php
namespace Warlords\GameBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateResourceCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        parent::configure();
        $this
            ->setName('WarlordsGameBundle:ResourceUpdate')
            ->setDescription('Update gold, land resources')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $playerstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findAll();
        //echo $playerstats[0]->getInfantry() . "\n";
        foreach ($playerstats as $player)
        {
            $land = $player->getLand();
            $gold = $player->getGold();
            
            $gold = $land+$gold;
            
            $soldiers = $player->getInfantry();
            $knights = $player->getKnights();
            $calvary = $player->getCalvary();
            
            $upkeep = $soldiers*25 + $knights*75 + $calvary*125;
            
            if($gold > $upkeep)
            {
                $gold = $gold-$upkeep;
            }
            //If not enough gold for upkeep, lose soldiers. Lose all gold
            else
            {
                $gold = 0;
                $soldiers = (int)($soldiers*0.995);
                $knights = (int)($knights*0.995);
                $calvary = (int)($calvary*0.995);
                
                $player->setInfantry($soldiers);
                $player->setKnights($knights);
                $player->setCalvary($calvary);
            }
            
            $player->setGold($gold);
            $em->persist($player);
        }
        $em->flush();
    }
}
?>
