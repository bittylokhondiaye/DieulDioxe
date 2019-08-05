<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Depot;
use App\Entity\Compte;
use App\Form\UserType;
use App\Entity\Caissier;
use App\Form\CompteType;
use App\Entity\Partenaire;
use App\Form\PartenaireType;
use App\Entity\UserPartenaire;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function ajoutPartenaire(Request $request,SerializerInterface $serializer, EntityManagerInterface $entityManager,UserPasswordEncoderInterface $passwordEncoder,ValidatorInterface $validator):Response
    {
        $partenaire= new Partenaire();
        $form=$this->createForm(PartenaireType::class, $partenaire);
        $values=$request->request->all();
       
        $form->submit($values);
        $entityManager= $this->getDoctrine()->getManager();
        $entityManager->persist($partenaire);
        $entityManager->flush();
        
        $email=$partenaire->getEmail();
        $password=$partenaire->getPassword();


            $user = new User();
            $form=$this->createForm(UserType::class, $user);
            $form->handleRequest($request);
            $values=$request->request->all();
            $form->submit($values);
            $files=$request->files->all()['imageName'];

            
            $user->setEmail($email);
            $encode=$passwordEncoder->encodePassword($user, $password);
            $user->setPassword($encode);
            $user->setImageFile($files);
            $user->setProfile("admin");
            $user->setStatut("BLOQUER");
            $roles=["ROLE_ADMIN"];
        
            $user->setRoles($roles);
            
            $errors = $validator->validate($user);
            if(count($errors)) {
                
                return new Response($errors, 500 );
            }
            $entityManager->persist($user);
            $entityManager->flush();


        $compte= new Compte();
        $form=$this->createForm(CompteType::class, $compte);
        $form->handleRequest($request); 
        $values=$request->request->all();
        $form->submit($values);
        $compte->setDateCreation(new \DateTime());
        $compte->setMontantInitial(0);
        $compte->setMontantDeposer(0);
        $compte->setSolde(0);
        $compte->setPartenaire($partenaire);
        $entityManager= $this->getDoctrine()->getManager();
        $errors = $validator->validate($compte);
        if(count($errors)) {
            return new Response($errors, 500);
        }
        $entityManager->persist($compte);
        $entityManager->flush();
        
        
        $data=[
            'status1'=>201,
            'message1'=>' Le partenaire est ajouté'
        ];

        return new JsonResponse($data,201);
    }

    /**
     * @Route("/userPartenaires", name="addUserPartenaire", methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function addUserPartenaire(Request $request, SerializerInterface $serializer,EntityManagerInterface $entityManager,ValidatorInterface $validator)
    {
        $userPartenaire = $serializer->deserialize($request->getContent(), UserPartenaire::class, 'json');
        $errors = $validator->validate($userUpdate);
            if(count($errors)) {
                $errors = $serializer->serialize($errors, 'json');
                return new Response($errors, 500);
            }
        $entityManager->persist($userPartenaire);
        $entityManager->flush();
        $data = [
            'status2' => 201,
            'message2' => 'Le UserPartenaire a bien été ajouté'
        ];
        return new JsonResponse($data, 201);
    }

    /**
     * @Route("/api/compte" , name="addCompte", methods={"POST"})
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function addCompte(Request $request, SerializerInterface $serializer,EntityManagerInterface $entityManager,ValidatorInterface $validator)
    {
        $compte= new Compte();
        $form=$this->createForm(CompteType::class, $compte);
        $form->handleRequest($request); 
        $values=$request->request->all();
        $form->submit($values);
        $partenaire=$entityManager->getRepository(Partenaire::class)->find($values["partenaire"]);
        $compte->setDateCreation(new \DateTime());
        $compte->setMontantInitial(0);
        $solde=$compte->getMontantInitial()+$compte->getMontantDeposer();
        $compte->setSolde($solde);
        $compte->setPartenaire($partenaire);
        
        $entityManager= $this->getDoctrine()->getManager();
        $errors = $validator->validate($compte);
        if(count($errors)) {
            return new Response($errors, 500, [
                'Content-Type' => 'application/json'
            ]);
        }
        $entityManager->persist($compte);
        $entityManager->flush();
        $data = [
            'status3' => 201,
            'message3' => 'Le compte a bien été ajouté'
        ];
        return new JsonResponse($data, 201);
    }


    /**
     * @Route("/api/caissier" , name="addCaissier", methods={"POST"})
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function addCaissier(Request $request, SerializerInterface $serialize,EntityManagerInterface $entityManager,ValidatorInterface $validator)
    {
        $userPartenaire = $serialize->deserialize($request->getContent(), Caissier::class, 'json');
        $errors = $validator->validate($userPartenaire);
        if(count($errors)) {
            return new Response($errors, 500, [
                'Content-Type' => 'application/json'
            ]);
        }
        $entityManager->persist($userPartenaire);
        $entityManager->flush();
        $data = [
            'status' => 201,
            'message' => 'Le Caissier a bien été ajouté'
        ];
        return new JsonResponse($data, 201);
    }


    /**
     * @Route("/depot" , name="depotCompte", methods={"POST"})
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function depotCompte(Request $request,EntityManagerInterface $entityManager,ValidatorInterface $validator)
    {
        $depot=new Depot();
        $form=$this->createForm(Depot::class, $depot);
        $form->handleRequest($request); 
        $values=$request->request->all();
        $form->submit($values);
        $depot->setDate(new \DateTime());
        $entityManager->persist($depot);
        $entityManager->flush();

        $montant=$depot->getMontant();
        $compte=new Compte();
        $compte->setMontantInitial($compte->getMontantDeposer());
        $compte->setMontantDeposer($montant);
        $sole=
        $entityManager->persist($compte);
        $entityManager->flush();
        $errors = $validator->validate($depot);
        if(count($errors)) {
            return new Response($errors, 500, [
                'Content-Type' => 'application/json'
            ]);
        }

        
        
       
        $data = [
            'status' => 201,
            'message' => 'Le compte a bien été ajouté'
        ];
        return new JsonResponse($data, 201);
    }

}
