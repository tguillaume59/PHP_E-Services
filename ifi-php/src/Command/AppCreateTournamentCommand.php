<?php
/**
 * Created by PhpStorm.
 * User: tartara
 * Date: 29/11/17
 * Time: 11:39
 */

namespace App\Command;


use DateTimeImmutable;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Entity\Tournament;

class AppCreateTournamentCommand  extends Command
{

    private $mDoctrine;
    protected static $defaultName = "app:create-tournament";

    public function __construct(ManagerRegistry $sDoctrine)
    {
        parent::__construct();
        $this->mDoctrine = $sDoctrine;
    }

    /*
     * Permet de donner la description de la commande via la commande terminal
     * bin/console help app:create-tournament
     */
    protected function configure(){
        $this
            ->setDescription('Create tournament')
            ->addArgument('name',InputArgument::REQUIRED,"The tournament name")
            ->addArgument('date',InputArgument::REQUIRED,"The tournament date");
    }

    /*
     * Décris le comportement lorsque l'on exécute la commande
     * bin/console app:create-tournament "Mon tournois" "07/03/1995" --> attention mettre la date en anglais
     *
     * sortie :
     * Name: Mon tournois
     * Date: 07/03/1995
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tName = $input->getArgument('name');
        $tDate = $input->getArgument('date');

        $output->writeln(sprintf('Name: %s',$tName));
        $output->writeln(sprintf('Date: %s',$tDate));

        //enregistrement dans la bdd
        $tTournament = new Tournament();
        $tTournament->name = $tName;
        $tTournament->createAt = new DateTimeImmutable($tDate);
        $tManager = $this->mDoctrine->getManager();
        $tManager->persist($tTournament);
        $tManager->flush();

        $output->writeln("Tournament successly added in database");

    }


}