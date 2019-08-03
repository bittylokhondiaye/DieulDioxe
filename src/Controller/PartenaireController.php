<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Partenaire;
use App\Entity\Compte;
use App\Entity\UserPartenaire;
use App\Entity\User;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

 /**
     * @Route("/api") 
     */

class PartenaireController extends AbstractController
{
    /**
     * @Route("/partenaire", name="partenaire")
     */
    public function index()
    {
        return $this->render('partenaire/index.html.twig', [
            'controller_name' => 'PartenaireController',
        ]);
    }

    /**
     * @Route("/api/partenaires", name="ajouPartenaire",methods={"POST"}) 
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function ajoutPartenaire(Partenaire $partenaire,Request $request,SerializerInterface $serializer, EntityManagerInterface $entityManager,UserPasswordEncoderInterface $passwordEncoder,ValidatorInterface $validator)
    {
        $partenaire= new Partenaire();
        $email=getEmail();
        $password=getPassword();
        $entityManager->persist($partenaire);
        $entityManager->flush();

        $user= new User();
        $form=$this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        $values=$request->request->all();
        $form->submit($values);
        $files=$request->files->all()['imageName'];

            $user->setEmail($email);
            $user->setPassword($passwordEncoder->encodePassword($user, $password));
            $user->setImageFile($files);
            $user->setProfile("admin");
            $user->setStatut("BLOQUER");
            $user->setRoles(["ROLE_ADMIN"]);
            $errors = $validator->validate($user);
            if(count($errors)) {
                return new Response($errors, 500, [
                    'Content-Type' => 'application/json'
                ]);
            }
            $entityManager->persist($user);
            $entityManager->flush();


        $compte= new Compte();
        $values =$request->getContent();
        $compte->setNumeroCompte($values->NumeroCompte);
        $compte->setDateCreation($values->DateCreation);
        $compte->setMontantInitial(0);
        $compte->setMontantDeposer($values->MontantDeposer);
        $solde=getMontantInitial()+getMontantDeposer();
        $compte->setSolde($solde);
        $entityManager->persist($user);
        $entityManager->flush();
        
        
        $data=[
            'status'=>201,
            'message'=>' Le partenaire est ajouté'
        ];

        return new JsonResponse($data,201);
    }

    /**
     * @Route("/userPartenaires", name="addUserPartenaire", methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function addUserPartenaire(Request $request, SerializerInterface $serializer,EntityManagerInterface $entityManager)
    {
        $userPartenaire = $serializer->deserialize($request->getContent(), UserPartenaire::class, 'json');
        $entityManager->persist($userPartenaire);
        $entityManager->flush();
        $data = [
            'status' => 201,
            'message' => 'Le UserPartenaire a bien été ajouté'
        ];
        return new JsonResponse($data, 201);
    }

    /**
     * @Route("/api/compte" , name="addCompte", methods={"POST"})
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function addCompte(Request $request, SerializerInterface $serializer,EntityManagerInterface $entityManager)
    {
        $Compte = $serializer->deserialize($request->getContent(), Compte::class, 'json');
        $entityManager->persist($Compte);
        $entityManager->flush();
        $data = [
            'status' => 201,
            'message' => 'Le compte a bien été ajouté'
        ];
        return new JsonResponse($data, 201);
    }
}
