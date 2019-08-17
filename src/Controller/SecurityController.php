<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Compte;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
 


/**
* @Route("/api")
*/

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="register", methods={"POST"})
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, SerializerInterface $serializer, ValidatorInterface $validator)
    {
       
            $user = new User();
            $form=$this->createForm(UserType::class, $user);
            $form->handleRequest($request);
            $values=$request->request->all();
            $form->submit($values);
            $files=$request->files->all()['imageName'];

            $compte=$entityManager->getRepository(Compte::class)->find($values["Compte"]);
            $user->setCompte($compte);
            $user->setEmail($values["email"]);
            $user->setPassword($passwordEncoder->encodePassword($user, $values["password"]));
            $user->setImageFile($files);
            $user->setProfile($values["Profile"]);
            $user->setStatut("BLOQUER");
            $Profile=$values["Profile"];
            $roles=[];
            if($Profile=="user" ){
                $roles=["ROLE_USER"];
            }
            else if($Profile=="admin"){
                $roles=["ROLE_ADMIN"];
            }
            else if($Profile=="superAdmin"){
                $roles=["ROLE_SUPER_ADMIN"];
            }
            else if($Profile=="caissier"){
                $roles=["ROLE_CAISSIER"];
            }
        
            $user->setRoles($roles);
            
            $errors = $validator->validate($user);
            if(count($errors)) {
                
                return new Response($errors, 500  /* [
                    'Content-Type' => 'application/json'
                ] */ );
            }
            $entityManager->persist($user);
            $entityManager->flush();

            $data = [
                'status' => 201,
                'message' => 'L\'utilisateur a été créé'
            ];

            return new JsonResponse($data, 201);
      
    }


     /**
     * @Route("/login", name="login", methods={"POST"})
     */
    public function login(Request $request)
    {
        $user = $this->getUser();
        return $this->json([
            'username' => $user->getUsername(),
            'roles' => $user->getRoles()
        ]);
    }

    
}
