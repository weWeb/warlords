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
            $player->setGold($gold+$land);
            $em->persist($player);
        }
        $em->flush();
    }
}
?>
