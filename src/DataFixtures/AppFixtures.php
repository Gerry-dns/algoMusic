<?php

namespace App\DataFixtures;

use App\Entity\Groupe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $nomGroupe = [ // rock
            'The black keys',
            'The black angles',
            'The white stripes',
            'Led Zeppelin',
            'Jimmy Hendrix',
            'Janis Joplin',
            'The Beatles',
            

            // reggae 
            'Bob marley',
            'Lee scratch perry',
            'Tiken Jah Fakoly',
            'Groundation',

            // electro
            'Daft Punk',
            'Justice',
            ''

        
        ];

        for ($i=0; $i < count($nomGroupe); $i++) { 
            $groupe = new Groupe();
            $groupe->setnomGroupe($nomGroupe[$i]);

            $groupes[] = $groupe;
            $manager->persist($groupe);
    }
        $manager->flush($groupe);
}}