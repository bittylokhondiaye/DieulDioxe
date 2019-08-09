<?php

namespace App\Tests;

use App\Entity\Compte;
use App\Entity\Partenaire;
use Doctrine\ORM\EntityManagerInterface; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PartenaireControllerTest extends WebTestCase
{
    public function testaddUserPartenaire()
    {
        $client= static::createClient([], [
            'PHP_AUTH_USER'=>'fatou@gmail.com',
            'PHP_AUTH_PW'=>'fatou'
        ]);
        $crawler=$client->request(
            'POST',
            '/api/userPartenaires',
            [],
            [],
            [
        'CONTENT_TYPE'=>"application/json"],
            '{
            "Login":"test3",
            "password":"test3",
            "Prenom":"test3",
            "Nom":"Diop",
            "Telephone":77148575,
            "Email":"test3@gmail.com",
            "CNI":7498585,
            "partenaire":"/api/partenaires/1",
            "compte":"api/comptes/6"
        }'
        );
        $rep=$client->getResponse();
        var_dump($rep);
        $this->assertSame(201, $client->getResponse()->getStatusCode());
    }


    public function testaddCompte()
    {
        $client= static::createClient([], [
            'PHP_AUTH_USER'=>'labitty189@outlook.fr',
            'PHP_AUTH_PW'=>'labitty'
        ]);
        /* $compte=new Compte;
        $request=new Request;
        $container = $client->getContainer();
        $entityManager =get(EntityManagerInterface::class);  // $container 
        $values=$request->request->all();
        $partenaire=$entityManager->getRepository(Partenaire::class)->find($values["partenaire"]); */ 
        $crawler=$client->request(
            'POST',
            '/api/api/compte',
            [],
            [],
            [
        'CONTENT_TYPE'=>"multipart/form-data"],
             ' 
            "MontantDeposer"=>180000,
            "Partenaire"=>1
            '
             
        );
        $rep=$client->getResponse();
        var_dump($rep);
        $this->assertSame(201, $client->getResponse()->getStatusCode());
    }
}

