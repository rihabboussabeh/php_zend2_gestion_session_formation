<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Participant;
use Application\Model\Participanttable;
use Application\Model\Evenement;
use Application\Model\Evenementtable;
use Application\Model\Formation;
use Application\Model\Session;
use Application\Model\Inscrit;
use Application\Model\Presence;
use Application\Model\Message;
use Application\Model\Paiement;
use Application\Model\Centre;
use Application\Model\Seance;
use Application\Model\Inscription;
 use Zend\Mvc\MvcEvent;


class CentreController extends AbstractActionController
{private $Inscriptiontable;
     private $Sessiontable;
         private $Paiementtable;
          private $Seancetable;
      private $Formateurtable;
      private $Participanttable;
      private $Formationtable;
      private $Presencetable;
             private $authCentre;
       private $evenement;
           private $evenementtable;
    private $Evenementtable;
      private $Inscrittable;
           private $Messagetable;
   private $Centretable;
    private function getAuthCentre(){
        
      if (!$this->authCentre)  //test vide ?
       {    //initialiser usertable en post
             $sm = $this->getServiceLocator();
             $this->authCentre = $sm->get('AuthCentre');
         }
         return $this->authCentre;
  
        
    }
   private function getCentretable(){
        
      if (!$this->Centretable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Centretable = $sm->get('Application\Model\Centretable');
         }
       
         return $this->Centretable;   
    }
       
      private function getFormationtable(){
        
      if (!$this->Formationtable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Formationtable = $sm->get('Application\Model\Formationtable');
         }
         return $this->Formationtable;
  
        
    }
          private function getMessagetable(){
        
      if (!$this->Messagetable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Messagetable = $sm->get('Application\Model\Messagetable');
         }
         return $this->Messagetable;
  
        
    }
     private function getInscrittable(){
        
      if (!$this->Inscrittable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Inscrittable = $sm->get('Application\Model\Inscrittable');
         }
         return $this->Inscrittable;
  
        
    }
     private function getEvenementtable(){
        
      if (!$this->Evenementtable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Evenementtable = $sm->get('Application\Model\Evenementtable');
         }
         return $this->Evenementtable;
  
        
    }
      private function getPaiementtable(){
        
      if (!$this->Paiementtable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Paiementtable = $sm->get('Application\Model\Paiementtable');
         }
         return $this->Paiementtable;
  
        
    }
      private function getPresencetable(){
        
      if (!$this->Presencetable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Presencetable = $sm->get('Application\Model\Presencetable');
         }
         return $this->Presencetable;
  
        
    }
           private function getInscriptiontable(){
        
      if (!$this->Inscriptiontable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Inscriptiontable = $sm->get('Application\Model\Inscriptiontable');
         }
         return $this->Inscriptiontable;
 }  
      private function getSeancetable(){
        
      if (!$this->Seancetable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Seancetable = $sm->get('Application\Model\Seancetable');
         }
         return $this->Seancetable;
 } 
       private function getFormateurtable(){
        
      if (!$this->Formateurtable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Formateurtable = $sm->get('Application\Model\Formateurtable');
         }
         return $this->Formateurtable;
  
        
    }
       private function getParticipanttable(){
        
      if (!$this->Participanttable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Participanttable = $sm->get('Application\Model\Participanttable');
         }
         return $this->Participanttable;
  
        
    }
         private function getSessiontable(){
        
      if (!$this->Sessiontable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Sessiontable = $sm->get('Application\Model\Sessiontable');
         }
         return $this->Sessiontable;
  
        
    }
    public function indexAction()
    {
        return new ViewModel();
    }
  
     public function StatAction()
    {
       return new ViewModel();
    }
       public function formateurpAction()
    {  //session formateur et participant
    // 
        //recuperation de la variable en get
                   $idp=$this->params()->fromQuery('idp');

                $formateur = $this->getFormateurtable()->fetchAll();
                $participant = $this->getParticipanttable()->fetchAll();
                $edit= $this->getSessiontable()->fetchid($idp);
            $formateur->buffer();
             $participant->buffer();
          $edit->buffer();
$current = $formateur->current();
$current = $edit->current();
$current = $participant->current();
                 return new ViewModel(
                         array(
                             'noo' => $edit ,
                             'formtable' => $formateur,
                              'participant' => $participant
                         )

                         );
    }
     public function ListpAction()
    {
          $user=$this->getAuthCentre()
                    ->getStorage()->read();
          
          $formateur = $this->getFormateurtable()->fetchAll();
      //appel du dao
       $sessions = $this->getSessiontable()->fetchallbycentreid($user->id);
  $sessions->buffer();

$current = $sessions->current();  
$formation = $this->getFormationtable()->fetchAll();
  $formation->buffer();

$current = $formation->current();
$formateur->buffer();

$current = $formateur->current();
   // foreach ($users as $user){
  //  var_dump($user);}
   // exit();
        return new ViewModel(
                array(
                    'tabpropo' => $sessions,
                    'formateur' => $formateur, 
                    'formation' => $formation,
                    
                )
                
                );
  
    }
         public function listesessionAction()
   { 
           $user=$this->getAuthCentre()
                    ->getStorage()->read();   
             
             $idp=$this->params()->fromQuery('idp');

               
                $form= $this->getSessiontable()->fetchallbycentreid($user->id);
            // foreach ($users as $user){
           //  var_dump($user);}
            // exit();
                 return new ViewModel(
                         array(
                             'tabpropo' => $form
                         )

                         );
      
           }
              public function listevenementAction()
   { 
           $user=$this->getAuthCentre()
                    ->getStorage()->read();   
             
             $idp=$this->params()->fromQuery('idp');

               
                $form= $this->getEvenementtable()->fetchallbycentreid($user->id);
            // foreach ($users as $user){
           //  var_dump($user);}
            // exit();
                 return new ViewModel(
                         array(
                             'evenement' => $form
                         )

                         );
      
           }
     public function ListfAction()
    {
        
         
      //appel du dao
       $formateur = $this->getFormateurtable()->fetchAll();
    //affichage test
   // foreach ($users as $user){
  //  var_dump($user);}
   // exit();
        return new ViewModel(
                array(
                    'formtable' => $formateur
                )
                
                );
    }
    
         public function formprofilAction()
      {
              //recuperation de la variable en get
                   $id=$this->params()->fromQuery('id');

               
                $form= $this->getFormateurtable()->fetchid($id);
                 $formation= $this->getFormationtable()->fetchbyformateur($id);
                  $formation->buffer();
$current = $formation->current();
            // foreach ($users as $user){
           //  var_dump($user);}
            // exit();
                 return new ViewModel(
                         array(
                             'noo' => $form,
                              'formation' => $formation,
                         )

                         );

           }
    
    
      public function deletepaiementAction()
    {   
           //recuperation de la variable en get
           $id=$this->params()->fromQuery('id');
            $id_participant=$this->params()->fromQuery('id_participant');
              $id_session=$this->params()->fromQuery('id_session');
           
           //suppression de la base
       $paiement= $this->getPaiementtable()->deletePaiement($id);
        
        //redirection
        return $this
            ->redirect()
    ->toUrl('participant?id_participant='.$id_participant.'&id_session='.$id_session);
        
    }
    
     public function deleteAction()
    {   
           //recuperation de la variable en get
           $idp=$this->params()->fromQuery('idp');
           
           //suppression de la base
       $session= $this->getSessiontable()->deleteSession($idp);
        
        //redirection
        return $this
            ->redirect()
    ->toUrl('listp');
        
    }
      public function deletfAction()
    {   
           //recuperation de la variable en get
           $id=$this->params()->fromQuery('id');
           
           //suppression de la base
       $formateur= $this->getFormateurtable()->deleteformateur($id);
        
        //redirection
        return $this
            ->redirect()
    ->toUrl('listf');
        
    }
    
    public function updataAction()
    {   
           //recuperation de la variable en get
           $id=$this->params()->fromQuery('id');
   // get
           $formateur = $this->getFormateurtable()->getFormateur($id);

          if(!($formateur->etat = "activer"))
          {
                $formateur->etat = "activer";}
              
       
       $this->getFormateurtable()->saveformateur($formateur);
        
        //redirection
        return $this
            ->redirect()
    ->toUrl('listf');
        
    }
        
    public function updatparticipantAction()
    {   
           //recuperation de la variable en get
           $id=$this->params()->fromQuery('id');
            $session=$this->params()->fromQuery('id_session');
            
           $inscription = $this->getInscriptiontable()->getInscription($id);

          if(!($inscription->etat = "activer"))
          {
                $inscription->etat = "activer";}
              
       
       $this->getInscriptiontable()->saveInscription($inscription);
        
        //redirection
        return $this
            ->redirect()
    ->toUrl('listeparticipant?id_session='.$session);
        
    }
       public function updatparticipanttAction()
    {   
           //recuperation de la variable en get
           $id=$this->params()->fromQuery('id');
           
            
           $inscription = $this->getParticipanttable()->getParticipant($id);

          if(!($inscription->etat = "activer"))
          {
                $inscription->etat = "activer";}
              
       
       $this->getParticipanttable()->saveParticipant($inscription);
        
        //redirection
        return $this
            ->redirect()
    ->toUrl('inscription');
        
    }  public function updatparticipantstAction()
    {   
           //recuperation de la variable en get
           $id=$this->params()->fromQuery('id');
           
            
           $inscription = $this->getParticipanttable()->getParticipant($id);

          if($inscription->etat = "activer")
          {
                $inscription->etat = "desactiver";}
              
       
       $this->getParticipanttable()->saveParticipant($inscription);
        
        //redirection
        return $this
            ->redirect()
    ->toUrl('inscription');
        
    }
     public function editseanceAction()
    {   
           //recuperation de la variable en get
           $id=$this->params()->fromQuery('id');
       $id_session=$this->params()->fromQuery('id_session');
           $seance = $this->getSeancetable()->getSeance($id);

          if($seance->etat = "activer")
          {
                $seance->etat = "desactiver";}
              
       
       $this->getSeancetable()->saveSeance($seance);
        
        //redirection
        return $this
            ->redirect()
     ->toUrl('lesseances?id_session='.$id_session);
        
    }
      public function editseancesAction()
    {   
           //recuperation de la variable en get
           $id=$this->params()->fromQuery('id');
       $id_session=$this->params()->fromQuery('id_session');
           $seance = $this->getSeancetable()->getSeance($id);

          if($seance->etat = "desactiver")
          {
                $seance->etat = "activer";}
              
       
       $this->getSeancetable()->saveSeance($seance);
        
        //redirection
        return $this
            ->redirect()
     ->toUrl('lesseances?id_session='.$id_session);
        
    }
      public function updatparticipantsAction()
    {   
           //recuperation de la variable en get
           $id=$this->params()->fromQuery('id');
       $id_session=$this->params()->fromQuery('id_session');
           $inscription = $this->getInscriptiontable()->getInscription($id);

          if($inscription->etat = "activer")
          {
                $inscription->etat = "desactiver";}
              
       
       $this->getInscriptiontable()->saveInscription($inscription);
        
        //redirection
        return $this
            ->redirect()
     ->toUrl('listeparticipant?id_session='.$id_session);
        
    }
       public function updatatAction()
    {   
           //recuperation de la variable en get
           $idp=$this->params()->fromQuery('idp');
   // get
           $session = $this->getSessiontable()->getSession($idp);

          if(!($session->etat = "activer"))
          {
                $session->etat = "activer";}
              
       
       $this->getSessiontable()->saveSession($session);
        
        //redirection
        return $this
            ->redirect()
    ->toUrl('updatep');
        
    }
        public function updatattAction()
    {   
           //recuperation de la variable en get
           $idp=$this->params()->fromQuery('idp');
   // get
           $session = $this->getSessiontable()->getSession($idp);

          if(!($session->etat = "activer"))
          {
                $session->etat = "activer";}
              
       
       $this->getSessiontable()->saveSession($session);
        
        //redirection
        return $this
            ->redirect()
    ->toUrl('listesession');
        
    }
    
      public function updateAction()
    {   
           $id=$this->params()->fromQuery('id');

           $formateur = $this->getFormateurtable()->getFormateur($id);

          if(($formateur->etat = "active"))
          {
         
                $formateur->etat = "desactiver";
   }
          
          
       $this->getFormateurtable()->saveformateur($formateur);
        
        return $this
            ->redirect()
    ->toUrl('listf');
        
    }
        public function updatetAction()
    {   
           $idp=$this->params()->fromQuery('idp');

           $session= $this->getSessiontable()->getSession($idp);

          if(($session->etat = "active"))
          {
         
                $session->etat = "desactiver";
   }
          
          
       $this->getSessiontable()->savesession($session);
        
        return $this
            ->redirect()
    ->toUrl('updatep');
        
    }
          public function updatettAction()
    {   
           $idp=$this->params()->fromQuery('idp');

           $session= $this->getSessiontable()->getSession($idp);

          if(($session->etat = "active"))
          {
         
                $session->etat = "desactiver";
   }
          
          
       $this->getSessiontable()->savesession($session);
        
        return $this
            ->redirect()
    ->toUrl('listesession');
        
    }
             public function etateventAction()
    {   
           $id=$this->params()->fromQuery('id');

           $event= $this->getEvenementtable()->getEvenement($id);

          if(($event->etat = "activer"))
          {
         
                $event->etat = "desactiver";
   }
          
          
       $this->getEvenementtable()->saveEvenement($event);
        
        return $this
            ->redirect()
    ->toUrl('listevenement');
        
    }
        public function etateventtAction()
    {   
           $id=$this->params()->fromQuery('id');

           $event= $this->getEvenementtable()->getEvenement($id);

          if(($event->etat = "desactiver"))
          {
         
                $event->etat = "activer";
   }
          
          
       $this->getEvenementtable()->saveEvenement($event);
        
        return $this
            ->redirect()
    ->toUrl('listevenement');
        
    }
       public function updatepAction()
           {
        //recuperation de la variable en get
                   $idp=$this->params()->fromQuery('idp');

               
                $edit= $this->getSessiontable()->fetchid($idp);
            // foreach ($users as $user){
           //  var_dump($user);}
            // exit();
                 return new ViewModel(
                         array(
                             'noo' => $edit 
                         )

                         );
           }
   
      
           
           public function updateparticipantAction()
    {   
           $id=$this->params()->fromQuery('id');

           $participant= $this->getParticipanttable()->getParticipant($id);

          if(($participant->etat = "activer"))
          {
         
                $participant->etat = "desactiver";
   }
          
          
       $this->getParticipanttable()->saveparticipant($participant);
        
        return $this
            ->redirect()
    ->toUrl('formateurp');
   
        
    }
           
             public function updataparticipantAction()
     {   
           $id=$this->params()->fromQuery('id');

           $participant= $this->getParticipanttable()->getParticipant($id);

          if(!($participant->etat = "activer"))
          {
         
                $participant->etat = "activer";
   }
          
          
       $this->getParticipanttable()->saveparticipant($participant);
        
        return $this
            ->redirect()
    ->toUrl('formateurp');
        
    }
           
    
           
       public function formationAction()
    {
       
        return new ViewModel();
    }       
   
      public function addpropositionAction()
    {//recuperation des variable
        $session= new Session(); 
          $session->idp=$this->params()->fromPost('idp');
         
           $session->langage=$this->params()->fromPost('langage');
            $session->objectif=$this->params()->fromPost('objectif');
           $session->prequis=$this->params()->fromPost('prequis');
           $session->datedebut=$this->params()->fromPost('datedebut');
           $session->nbh=$this->params()->fromPost('nbh');
            $session->prixh=$this->params()->fromPost('prixh');
      $session->prixs=$this->params()->fromPost('prixs');
           $session->nbg=$this->params()->fromPost('nbg');
         $session->idformateur=$this->params()->fromPost('idformateur');
            $session->etat=$this->params()->fromPost('etat');
               $session->id_centre=$this->params()->fromPost('id_centre');
           
     
 
       try{
   $this->getSessiontable()->saveSession($session);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
      return $this
                         ->redirect()
                         ->toUrl("/Pferihab/public/application/centre/listp");
  
    
  
    }

      public function lesseancesAction()
    {
          
           
        //  $this->getAuthService()->clearIdentity();
  
         
          $id_session=$this->params()->fromQuery('id_session');
            $seance = $this->getSeancetable()->fetchseancebysession($id_session);
     
      
 

   return new ViewModel(array("seance"=>$seance));
       
      
              }    
     public function listeparticipantAction()
    {
          
                            
                      
        $payement= $this->getPaiementtable()->fetchAll();
       
    $payement->buffer();
$current = $payement->current();
   
             
         
          $id_session=$this->params()->fromQuery('id_session');
            $inscription = $this->getInscriptiontable()->fetchallbysessionid($id_session);
      
          
          $participant= $this->getParticipanttable()->fetchAll();
   
  $participant->buffer();
$current = $participant->current();
   $inscription->buffer();
$current = $inscription->current();

        $sessions= $this->getInscriptiontable()->fetchAll();
                   $session= $this->getSessiontable()->fetchAll();
                   $sessions->buffer();

$current = $sessions->current();
                     $session->buffer();
$current = $session->current();
          
                 $this->layout()->setVariable("sessions", $sessions);
                  $this->layout()->setVariable("session", $session);
                 

   return new ViewModel(array("payement"=>$payement,"sessions"=>$sessions,"session"=>$session,"inscription"=>$inscription,"participant"=>$participant));
       
          
          
          
              }  
               public function listsessionAction()
    {
          
           
        //  $this->getAuthService()->clearIdentity();
             //les sessions illi id mte3hem f inscrit
                 
         //  $inscrit= $this->getInscriptiontable()->fetchsessionins();
           
         //  var_dump($inscrit);      exit();
           
   $user=$this->getAuthCentre()
                    ->getStorage()->read();   
                     
        $sessions= $this->getInscrittable()->fetchAll();
                   $session= $this->getSessiontable()->fetchallbycentreid($user->id);
                   $sessions->buffer();

$current = $sessions->current();
                     $session->buffer();
$current = $session->current();
          
                 $this->layout()->setVariable("sessions", $sessions);
                  $this->layout()->setVariable("session", $session);
                 

   return new ViewModel(array("sessions"=>$sessions,"session"=>$session));
       
          
          
          
              } 
                       public function listseanceAction()
    {
          
           
        //  $this->getAuthService()->clearIdentity();
             
                      $user=$this->getAuthCentre()
                    ->getStorage()->read(); 
          
  
       $sessions= $this->getInscrittable()->fetchAll();
                   $session= $this->getSessiontable()->fetchallbycentreid($user->id);
                   $sessions->buffer();

$current = $sessions->current();
                     $session->buffer();
$current = $session->current();
          
                 $this->layout()->setVariable("sessions", $sessions);
                  $this->layout()->setVariable("session", $session);
                 

   return new ViewModel(array("sessions"=>$sessions,"session"=>$session));
       
          
          
          
              } 
                public function inscriptionAction()
    {
          
           
      
          
          $participant= $this->getParticipanttable()->fetchAll();
   
  $participant->buffer();
$current = $participant->current();
    

         
           
   return new ViewModel(array("participant"=>$participant));
       
          
          
          
              }  
              public function logoutAction(){
                 $this->getAuthService()->clearIdentity();
                 return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/index/login");
                 
                 
             }
               public function addpaiementAction()
    {//recuperation des variable
                      $session=$this->params()->fromQuery('id_session'); 
                         $participant=$this->params()->fromQuery('id_participant');       
       
   
        $montant=$this->params()->fromQuery('montant');
           $prix=$this->params()->fromQuery('prix'); 
           
           if($montant <= $prix){
       
        $paiement= new Paiement(); 
        
      
             
              $paiement->id=$this->params()->fromQuery('id');
        
    
            
             $paiement->id_session=$this->params()->fromQuery('id_session');
             $paiement->id_participant=$this->params()->fromQuery('id_participant');
            
          
           $paiement->montant=$this->params()->fromQuery('montant');
           $paiement->date= date("Y-m-d");
   
       try{
   $this->getPaiementtable()->savePaiement($paiement);
  
  
  
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }  $message=1;
       return $this
            ->redirect()
    ->toUrl('participant?id_participant='.$participant.'&id_session='.$session.'&message='.$message);
           } else {
               $message=0;
                return $this
            ->redirect()
    ->toUrl('participant?id_participant='.$participant.'&id_session='.$session.'&message='.$message);
  
    }}

     public function participantAction()
    {//recuperation des variable
                      $session=$this->params()->fromQuery('id_session'); 
                         $participant=$this->params()->fromQuery('id_participant'); 
            $inscription = $this->getInscriptiontable()->fetchallbysessionid($session);
     
                         
        $par= $this->getParticipanttable()->fetchid($participant);
    
        $inscription->buffer();
$current = $inscription->current();
  $par->buffer();
$current = $par->current();
  $payement= $this->getPaiementtable()->fetchAll();
       
    $payement->buffer();
$current = $payement->current();
  $sessions= $this->getSessiontable()->fetchAll();
                   $sessions->buffer();
$current = $sessions->current();

 $Presence = $this->getPresencetable()->fetchparticipant($participant);
      $Presence->buffer();
$current = $Presence->current();
 $Seance = $this->getSeancetable()->fetchseancebysession($session);
      $Seance->buffer();
$current = $Seance->current();

   return new ViewModel(array("Seance"=>$Seance,"Presence"=>$Presence,"par"=>$par,"payement"=>$payement,"inscription"=>$inscription,"session"=>$session,"sessions"=>$sessions));
       
  
    }
    public function onDispatch(MvcEvent $e) {
              
                if(!$this->getAuthCentre()->hasIdentity()){
                      return $this
                              ->redirect()
                              ->toUrl('/pferihab/public/application/index/login');
            }
               parent::onDispatch($e);
                   $centre=$this->getAuthCentre()
                    ->getStorage()->read();
                $this->layout()->setVariable("centre", $centre);
                 if($centre){
              
                  $session= $this->getSessiontable()->fetchallbycentreid($centre->id);
                 
                     $session->buffer();

$current = $session->current();
  $evenement= $this->getEvenementtable()->fetchallbycentreid($centre->id);
                 
                     $evenement->buffer();

$current = $evenement->current();
            
                 $this->layout()->setVariable("session", $session);
                $this->layout()->setVariable("evenement", $evenement);
                   
                 }
              
           } 
           
     
           
              public function messageAction()
    {
                        
           $recepteur=$_GET['idrecepteur'];
  
        $user=$this->getAuthCentre()
                    ->getStorage()->read(); 
  
  
     
           $message = $this->getMessagetable()->fetchmessage($user->id.'c',$recepteur.'f');
        
  $formateur= $this->getFormateurtable()->fetchid($recepteur);
   $formateur->buffer();
$current = $formateur->current();
          
      return new ViewModel(array("formateur"=>$formateur, "user"=>$user,"message"=>$message ,"recepteur"=>$recepteur  ));
  
      
      
       
  
     
    }
     public function addmessageAction()
    {//recuperation des variable
                  $user=$this->getAuthCentre()
                    ->getStorage()->read(); 
  $recepteur=$this->params()->fromPost('idr');
              
        $message= new Message(); 
          $message->id=$this->params()->fromPost('id');
         
  
             $message->emetteur=$this->params()->fromPost('ide').('c');
          $message->recepteur=$this->params()->fromPost('idr').('f');
         
           
                 $message->message=$this->params()->fromPost('message');
                    $message->date= date("Y-m-d H:i:sP");
         
             
 
       try{
   $this->getMessagetable()->saveMessage($message);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
    return $this
            ->redirect()
    ->toUrl('message?idrecepteur='.$recepteur);

  
    }
       public function listmessageAction()
    {
                        
         
  
      $user=$this->getAuthCentre()
                    ->getStorage()->read();
      
     
         $centre = $this->getCentretable()->fetchAll();
             $participant = $this->getParticipanttable()->fetchAll();
                 $formateur = $this->getFormateurtable()->fetchAll();
        $message = $this->getMessagetable()->fetchAll();
        
          $message->buffer();

$current = $message->current();

        $formateur->buffer();

$current = $formateur->current();

        $participant->buffer();

$current = $participant->current();

       $centre->buffer();

$current = $centre->current();


          
      return new ViewModel(array( "user"=>$user,"message"=>$message,"centre"=>$centre ,"participant"=>$participant,"formateur"=>$formateur ));
  
     
    }
    
     public function updatecentreAction()
           {
              //recuperation de la variable en get
                   $id=$this->params()->fromQuery('id');

               
                $edit= $this->getCentreTable()->fetchid($id);
            // foreach ($users as $user){
           //  var_dump($user);}
            // exit();
                 return new ViewModel(
                         array(
                             'centre' => $edit 
                         )

                         );

           }
           public function updatepasswordAction()
           {
              //recuperation de la variable en get
                   $id=$this->params()->fromQuery('id');

               
                $edit= $this->getCentreTable()->fetchid($id);
            // foreach ($users as $user){
           //  var_dump($user);}
            // exit();
                 return new ViewModel(
                         array(
                             'centre' => $edit 
                         )

                         );

           }
           
            public function addcentreAction()
             
            
    {    $email= $this->params()->fromPost('email');
           $login= $this->params()->fromPost('login');
        
        
        
        $centre= new Centre(); 
            $centre->id=$this->params()->fromPost('id');
      
           $centre->nom=$this->params()->fromPost('nom');
        
               $centre->ville=$this->params()->fromPost('ville');
             $centre->adress=$this->params()->fromPost('adress');
          $centre->num_tel=$this->params()->fromPost('num_tel');
            $centre->email= $this->params()->fromPost('email');
           $centre->login= $this->params()->fromPost('login');
            $centre->password= $this->params()->fromPost('password');
            
  
         
            
       try{
   $this->getCentretable()->saveCentre($centre);
   echo "true";
 
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
   return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/centre/updatecentre?id=".$centre->id);
  
    }
     public function addcentrepAction()
             
            
    {    $email= $this->params()->fromPost('email');
           $login= $this->params()->fromPost('login');
        
        
        
        $centre= new Centre(); 
            $centre->id=$this->params()->fromPost('id');
      
           $centre->nom=$this->params()->fromPost('nom');
        
               $centre->ville=$this->params()->fromPost('ville');
             $centre->adress=$this->params()->fromPost('adress');
          $centre->num_tel=$this->params()->fromPost('num_tel');
            $centre->email= $this->params()->fromPost('email');
           $centre->login= $this->params()->fromPost('login');
            $centre->password= $this->params()->fromPost('password');
            
  
         
            
       try{
   $this->getCentretable()->saveCentre($centre);
   echo "true";
 
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
   return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/centre/updatepassword?id=".$centre->id);
  
    }
     public function printAction()
    {
            $user=$this->getAuthCentre()
                    ->getStorage()->read();  
            
         $nomparticipant=$this->params()->fromQuery('nomparticipant');
         
     $prenomparticipant=$this->params()->fromQuery('prenomparticipant');
     
        $id_session=$this->params()->fromQuery('id_session');   
        
       $nomcentre=$user->nom;
       
         $villecentre=$user->ville;
         
         $adresscentre=$user->adress;
         
                 $montant=$this->params()->fromQuery('montant'); 
                 
                  $date=$this->params()->fromQuery('date');
         
                $session= $this->getSessiontable()->fetchid($id_session);
              

          $session->buffer(); 
$current = $session->current();
 
                 return new ViewModel(
                         array(
                             'session' => $session ,
                             'date' => $date,
                               'montant' => $montant,
                              'adresscentre' => $adresscentre,
                              'villecentre' => $villecentre,
                              'nomcentre' => $nomcentre,
                             'id_session' => $id_session,
                               'prenomparticipant' => $prenomparticipant,
                              'nomparticipant' => $nomparticipant
                         
                         )

                         );
    }
  
           

    
}
