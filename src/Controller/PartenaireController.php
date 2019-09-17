<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Code;
use App\Entity\User;
use App\Entity\Depot;
use App\Entity\Compte;
use App\Form\UserType;
use App\Form\DepotType;
use App\Form\User1Type;
use App\Entity\Caissier;
use App\Form\CompteType;
use App\Entity\Partenaire;
use App\Form\CaissierType;
use App\Entity\Transaction;
use App\Form\PartenaireType;
use App\Form\TransactionType;
use App\Entity\UserPartenaire;
use App\Form\UserPartenaireType;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class PartenaireController extends AbstractController
{
    /**
     * @Route("/partenaire", name="partenaire")
     */
    public function index()
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('partenaire/index.html.twig', [
            'controller_name' => 'PartenaireController',
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("contrat de partenariat.pdf", [
            "Attachment" => false
        ]);
        
    }

    /**
     * @Route("/api/partenaires", name="ajoutPartenaire",methods={"POST"}) 
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function ajoutPartenaire(Request $request,SerializerInterface $serializer, EntityManagerInterface $entityManager,UserPasswordEncoderInterface $passwordEncoder,ValidatorInterface $validator):Response
    {
        $partenaire= new Partenaire();
        $form=$this->createForm(PartenaireType::class, $partenaire);
        $values=$request->request->all();
       
        $form->submit($values);
        $entityManager= $this->getDoctrine()->getManager();
        $errors = $validator->validate($partenaire);
            if(count($errors)) {
                
                return new Response($errors, 500 );
            }
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
        $numero=date("Y").date("m").date("H").date("i").date("s").$compte->getId();
        $compte->setNumeroCompte($numero);
        $compte->setMontantInitial(0);
        $compte->setMontantDeposer(75000);
        $compte->setSolde($compte->getMontantInitial()+$compte->getMontantDeposer());
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
     * @Route("/api/userPartenaires", name="addUserPartenaire", methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function addUserPartenaire(Request $request, SerializerInterface $serializer,EntityManagerInterface $entityManager,ValidatorInterface $validator,UserPasswordEncoderInterface $passwordEncoder)
    {
        $userPartenaire= new UserPartenaire();
        $form=$this->createForm(UserPartenaireType::class, $userPartenaire);
        $values=$request->request->all();
        $form->submit($values);
        $utilisateur=$this->getUser();
        $partenaire=$utilisateur->getPartenaire();
        $userPartenaire->setPartenaire($partenaire);
        $entityManager= $this->getDoctrine()->getManager();
        $errors = $validator->validate($userPartenaire);
            if(count($errors)) {
                
                return new Response($errors, 500 );
            }
        $entityManager->persist($userPartenaire);
        $entityManager->flush();
            $email=$userPartenaire->getEmail();
            $password=$userPartenaire->getPassword();
            $compte=$userPartenaire->getCompte();
            $user=new User;
            $form=$this->createForm(UserType::class, $user);
            $form->handleRequest($request);
            $values=$request->request->all();
            $form->submit($values);
            $files=$request->files->all()['imageName'];
            $encode=$passwordEncoder->encodePassword($user, $password);
            $user->setEmail($email);
            $user->setPassword($encode);
            $user->setImageFile($files);
            $user->setPartenaire($partenaire);
            $user->setCompte($compte);
            $user->setProfile("user");
            $user->setStatut("BLOQUER");
            $roles=["ROLE_USER"];
        
            $user->setRoles($roles);
            
            $errors = $validator->validate($user);
            if(count($errors)) {
                
                return new Response($errors, 500 );
            }
            $entityManager->persist($user);
            $entityManager->flush();
        $entityManager->persist($userPartenaire);
        $entityManager->flush();
        $data = [
            'status2' => 201,
            'message2' => 'Le UserPartenaire a bien été ajouté'
        ];
        return new JsonResponse($data, 201);
    }

    /**
     * @Route("/api/api/compte" , name="addCompte", methods={"POST"})
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function addCompte(Request $request, SerializerInterface $serializer,EntityManagerInterface $entityManager,ValidatorInterface $validator)
    {
        $compte= new Compte();
        $form=$this->createForm(CompteType::class, $compte);
        $form->handleRequest($request); 
        $values=$request->request->all();
        $form->submit($values);
       
       $partenaire=$compte->getPartenaire();
        $compte->setDateCreation(new \DateTime());
        $compte->setMontantInitial(0);
        $solde=$compte->getMontantInitial()+$compte->getMontantDeposer();
        $compte->setSolde($solde);
        $compte->setPartenaire($partenaire);
        $numero=date("Y").date("m").date("H").date("i").date("s").$compte->getId();
        $compte->setNumeroCompte($numero);
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
     * @Route("/api/api/caissier" , name="addCaissier", methods={"POST"})
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
            'status4' => 201,
            'message4' => 'Le Caissier a bien été ajouté'
        ];
        return new JsonResponse($data, 201);
    }


    /**
     * @Route("/api/depot" , name="depotCompte", methods={"POST"})
     * @IsGranted("ROLE_CAISSIER")
     */
    public function depotCompte(Request $request,EntityManagerInterface $entityManager,ValidatorInterface $validator)
    {
        $depot=new Depot();
        $form=$this->createForm(DepotType::class, $depot);
        $form->handleRequest($request); 
        $values=$request->request->all();
        $form->submit($values);
        $caissier=$this->getUser();
        
        $depot->setCaissier($caissier);
        $compte=$entityManager->getRepository(Compte::class)->find($values["Compte"]);
        if(!$compte){
            throw new Exception('ce compte n existe pas');
        }
        $depot->setCompte($compte);
        $depot->setDate(new \DateTime());
        $errors = $validator->validate($depot);
        if(count($errors)) {
            return new Response($errors, 500, [
                'Content-Type' => 'application/json'
            ]);
        }
        $entityManager->persist($depot);
        $entityManager->flush();
        $montant=$depot->getMontant();
        
        $compte->getMontantInitial();
        $compte->setMontantInitial($compte->getSolde());
        $compte->setMontantDeposer($montant);
        $solde=$compte->getSolde()+$compte->getMontantDeposer();
        $compte->setSolde($solde);
        $entityManager->persist($compte);
        $entityManager->flush();
        $errors = $validator->validate($depot);
        if(count($errors)) {
            return new Response($errors, 500, [
                'Content-Type' => 'application/json'
            ]);
        }
        $data = [
            'status3' => 201,
            'message3' => 'Le depot a été fait'
        ];
        return new JsonResponse($data, 201);
    }

    /**
     * @Route("/api/makeTransaction" , name="makeTransaction", methods={"POST"})
     * @IsGranted("ROLE_USER")
     */
    public function makeTransaction(Request $request,EntityManagerInterface $entityManager,ValidatorInterface $validator)
    {
        $transaction= new Transaction();
        $form=$this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);
        $values=$request->request->all();
        $form->submit($values);
        $transaction->setDateTransaction(new \DateTime());
        $user = $this->getUser();         
        $compte=$user->getCompte();
        $compte=$entityManager->getRepository(Compte::class)->find($compte);
        $transaction->setCompte($compte);
        $compte->setMontantInitial($compte->getSolde());
        $montant=$transaction->getMontant();
        
        $borneInf=array(1,501,1001,1101,1501,2001,3001,5001,6001,10001,12001,15001,17001,20001,25001,30001,35001,40001,50001,60001,70001,75001,100001,125001,150001,175001,200001,250001,300001,350001,400001,500001,600001,700001,750001,1000001,1250001,1500001,2000001);
        $borneSup=array(500,1000,1100,1500,2000,3000,5000,6000,10000,12000,15000,17000,20000,25000,30000,35000,40000,50000,60000,70000,75000,100000,125000,150000,175000,200000,250000,300000,350000,400000,500000,600000,700000,75000,1000000,1250000,1500000,2000000,3000000);
        $frais=array(50,100,100,100,200,200,400,600,600,900,900,1000,100,1500,1500,1500,1800,1800,2000,2700,2700,3000,3600,3600,3800,4600,6400,8000,8500,9900,11900,11900,13600,14500,21700,24500,31900,36000,0.2);
        for ($i=0;$i<count($borneSup) && !($montant>=$borneInf[$i] && $montant<=$borneSup[$i]);$i++) {
                $Frais=$frais[$i];
        }
        $transaction->setFrais($Frais);
        $etat=($transaction->getFrais()*30)/100;
        $transaction->setCommissionEtat($etat);
        $system=($transaction->getFrais()*40)/100;
        $transaction->setCommissionSystem($system);
        $type=$transaction->getType();
        if($type=="envoi" && $compte->getSolde()>=$montant){
            $transaction->setDateTransaction(new \DateTime());
            $code=date("Y").date("m").date("H").date("i").date("s");
            $transaction->setCodeTransaction($code);
            $partenaire=($transaction->getFrais()*10)/100;
            $transaction->setCommissionPartenaire($partenaire);
            $compte->setSolde(($compte->getSolde()-$transaction->getMontant())+$partenaire);
            $compte->setMontantDeposer($partenaire);
            $codeRetrait=new Code;
            $codeRetrait->setSiRetire(false);
            $codeRetrait->setCodeRetrait($code);
            $entityManager->persist($codeRetrait);
            $entityManager->flush();
            $entityManager->persist($transaction);
        $entityManager->flush();
        }
        else if($type=="retrait" )
        {
            
            $code=$values['CodeTransaction'];
            
            $codeRetrait=$entityManager->getRepository(Code::class)->findOneBy(array('CodeRetrait' => $code));
            
            if($codeRetrait==null){ throw new Exception('Le code est invalide');}
            else{
                if(($codeRetrait->getSiRetire())==true){throw new Exception('le retrait a déja été fait avec ce code');}
                else if($codeRetrait && ($codeRetrait->getSiRetire())==false){
                    $transaction->setDateTransaction(new \DateTime());
                    $transaction->setCodeTransaction($values['CodeTransaction']);
                    $partenaire=($transaction->getFrais()*20)/100;
                    $transaction->setCommissionPartenaire($partenaire);
                    $compte->setSolde(($compte->getSolde()+$transaction->getMontant())+$partenaire);
                    $compte->setMontantDeposer($transaction->getMontant()+$partenaire);
                    $transaction->setDateTransaction(new \DateTime());
                    $codeRetrait->setSiRetire("true");
                    $entityManager->persist($codeRetrait);
                    $entityManager->flush();
                    $entityManager->persist($transaction);
                    $entityManager->flush();
                }
            }
            
             
                
        }
        $entityManager->persist($compte);
        $entityManager->flush();
        $entityManager->persist($transaction);
        $entityManager->flush();
        $errors = $validator->validate($transaction);
        if(count($errors)) {
            return new Response($errors, 500, [
                'Content-Type' => 'application/json'
            ]);
        }

        $data = [
            'status' => 201,
            'message' => 'La transaction a bien été faite' 
        ];
        return new JsonResponse($data, 201);
    }

    /**
     * @Route("/api/bloquer/{id}" , name="bloquer", methods={"PUT"})
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function bloquer(Request $request,User $user,UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $partenaireUpdate=$entityManager->getRepository(User::class)->find($user->getId());
        $values = json_decode($request->getContent());
            $user->getCompte();
            $user->getEmail();
            $user->getPassword();
            
            $user->getImageName();
            if($user->getStatut()=="BLOQUER"){
                $partenaireUpdate->setStatut("DEBLOQUER");
            }
            else{
                $partenaireUpdate->setStatut("BLOQUER");
            }
            $Statut=$partenaireUpdate->getStatut();
            if($Statut=="DEBLOQUER"){
                $roles=["ROLE_BLOQUE"];    
            }
            else{
                if($user->getProfile()=="user"){
                    $roles=["ROLE_USER"];
                }
                else if($user->getProfile()=="admin"){
                    $roles=["ROLE_ADMIN"];
                }
                else if($user->getProfile()=="superAdmin"){
                    $roles=["ROLE_SUPER_ADMIN"];
                }
                else if($user->getProfile()=="caissier"){
                    $roles=["ROLE_CAISSIER"];
                }
            }
            $user->setRoles($roles);
        $errors = $validator->validate($partenaireUpdate);
            if(count($errors)) {
                $errors = $serializer->serialize($errors, 'json');
                return new Response($errors, 500, [
                    'Content-Type' => 'application/json'
                ]);
            }
            
            $entityManager->flush();

            $data = [
                'status' => 201,
                'message' => 'L\'utilisateur a été mis a jour'
            ];

            return new JsonResponse($data, 201);

    }

    /**
     * @Route("/api/listerPartenaire/" , name="listerPartenaire", methods={"GET"})
     * @IsGranted({"ROLE_ADMIN",  "ROLE_SUPER_ADMIN"})
    */
    
    public function listerPartenaire(EntityManagerInterface $entityManager,Request $request,SerializerInterface $serializer)
    {
        
        $partenaire = $entityManager->getRepository(Partenaire::class)->findAll();
        $data = $serializer->serialize($partenaire, 'json');
        return new Response($data, 200, [
            'Content-Type' => 'application/json'
        ]);
        
    }

    /**
     * @Route("/api/listerCompte" , name="listerCompte", methods={"GET"})
    */
    
    public function listerCompte(EntityManagerInterface $entityManager,Request $request,SerializerInterface $serializer)
    {
        
        $compte = $entityManager->getRepository(Compte::class)->findAll();
        $data = $serializer->serialize($compte, 'json');
        return new Response($data, 200, [
            'Content-Type' => 'application/json'
        ]);
        
    }





    /**
     * @Route("/api/user" , name="listerUser", methods={"GET"})
     * @IsGranted({"ROLE_ADMIN",  "ROLE_SUPER_ADMIN"})
    */
    
    public function listerUser(EntityManagerInterface $entityManager,Request $request,SerializerInterface $serializer)
    {   
        $user=$this->getUser();
        $partenaire=$user->getPartenaire();
        if ($user->getRoles()[0]=='ROLE_SUPER_ADMIN') {
            $liste = $entityManager->getRepository(User::class)->findBy(array('Profile' => 'admin'));
            $data = $serializer->serialize($liste, 'json');
            return new Response($data, 200, [
                'Content-Type' => 'application/json'
            ]);
        }  
        
         if ($user->getRoles()[0]=='ROLE_ADMIN') {
            $liste = $entityManager->getRepository(User::class)->findBy(array('Partenaire'=>$partenaire));
            $data = $serializer->serialize($liste, 'json');
            return new Response($data, 200, [
                'Content-Type' => 'application/json'
            ]);
        } 

    }
    
}
