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
use Application\Model\Centre;
use Application\Model\Formateur;
use Application\Model\Formation;
use Application\Model\Formationtable;
 
 

class IndexController extends AbstractActionController
  {  
       private $authService;
        private $authparticipant;
           private $authCentre;
           
    private $Sessiontable;
       private $Centretable;
  private $Formationtable;
    private $Formateurtable;
     private $participanttable;

    private function getAuthService(){
        
      if (!$this->authService)  //test vide ?
       {    //initialiser usertable en post
             $sm = $this->getServiceLocator();
             $this->authService = $sm->get('AuthService');
         }
         return $this->authService;
  
        
    }
      private function getAuthCentre(){
        
      if (!$this->authCentre)  //test vide ?
       {    //initialiser usertable en post
             $sm = $this->getServiceLocator();
             $this->authCentre = $sm->get('AuthCentre');
         }
         return $this->authCentre;
  
        
    }
    
       private function getAuthparticipant(){
        
      if (!$this->authparticipant)  //test vide ?
       {    //initialiser usertable en post
             $sm = $this->getServiceLocator();
             $this->authparticipant = $sm->get('Authparticipant');
         }
         return $this->authparticipant;
  
        
    }
     
       private function getSessiontable(){
        
      if (!$this->Sessiontable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Sessiontable = $sm->get('Application\Model\Sessiontable');
         }
       
         return $this->Sessiontable;   
    }
    
       private function getCentretable(){
        
      if (!$this->Centretable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Centretable = $sm->get('Application\Model\Centretable');
         }
       
         return $this->Centretable;   
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
        
      if (!$this->participanttable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->participanttable = $sm->get('Application\Model\Participanttable');
         }
       
         return $this->participanttable;   
    }
    
        private function getFormationtable(){
        
      if (!$this->Formationtable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Formationtable = $sm->get('Application\Model\Formationtable');
         }
         return $this->Formationtable;   
    }


    public function indexAction()
    {
          $this->layout('layout/layoutind');
        return new ViewModel();
    }
    
      public function loginAction()
    {
       $this->layout('layout/layoutind');
        return new ViewModel();
    }
      public function login2Action()
    {
       $this->layout('layout/layoutind');
        return new ViewModel();
    }
         
    
    public function listeformationAction()
    {
      
          $this->layout('layout/layoutind');
 
         
      //appel du dao
       $sessions = $this->getSessiontable()->fetchAll();
        $formation = $this->getFormationtable()->fetchAll();
   $formation->buffer();

$current = $formation->current();
        return new ViewModel(
                array(
                    'tabpropo' => $sessions,
           
                    'tabfor' => $formation
            )
                
                );
  
    }
     public function dologinAction()
    {
        $login=$this->params()->fromPost('login');
        $password=$this->params()->fromPost('password');
        
        //recupiration de db adabter existant
   $authService= $this->getAuthService();
    $authAdapter=$authService->getAdapter();
    $authAdapter
            
    ->setIdentity($login)
    ->setCredential($password)
;
//lancer la verification
$result=$authService->authenticate($authAdapter);

if($result->isValid())
{
  
    echo"true";
     $formateur=$authAdapter->getResultRowObject();
$authService->getStorage()->write($formateur);
 
} else { echo"false";}

    
   
exit();


    }
      public function dologinpAction()
    {
        $login=$this->params()->fromPost('login');
        $password=$this->params()->fromPost('password');
        
        //recupiration de db adabter existant
   $authparticipant= $this->getAuthparticipant();
    $authAdapter=$authparticipant->getAdapter();
    $authAdapter
            
    ->setIdentity($login)
    ->setCredential($password)
;
//lancer la verification
$result=$authparticipant->authenticate($authAdapter);

if($result->isValid())
{
  
    echo"true";
     $participant=$authAdapter->getResultRowObject();
$authparticipant->getStorage()->write($participant);
 
} else { echo"false";}

    
   
exit();


    }
     public function dologinaAction()
    {
        $login=$this->params()->fromPost('login');
        $password=$this->params()->fromPost('password');
        
        //recupiration de db adabter existant
   $authCentre= $this->getAuthCentre();
    $authAdapter=$authCentre->getAdapter();
    $authAdapter
            
    ->setIdentity($login)
    ->setCredential($password)
;
//lancer la verification
$result=$authCentre->authenticate($authAdapter);

if($result->isValid())
{
  
    echo"true";
     $Centre=$authAdapter->getResultRowObject();
$authCentre->getStorage()->write($Centre);
 
} else { echo"false";}

    
   
exit();


    }
    
     
        public function inscriptionparticipantAction()
    {
     $this->layout('layout/layoutind');
       //recuperation de la variable en get
                   $idp=$this->params()->fromQuery('idp');

               
             
            // foreach ($users as $user){
           //  var_dump($user);}
            // exit();
                 return new ViewModel(
                      

                         );
 }
   public function inscriptionformateurAction()
    {
       $this->layout('layout/layoutind');
        return new ViewModel();
    }
       public function inscriptioncentreAction()
    {
       $this->layout('layout/layoutind');
        return new ViewModel();
    }
     public function addformateurAction()
    {//recuperation des variable
              $email= $this->params()->fromPost('email');
           $login= $this->params()->fromPost('login'); 
           
           
        $formateur= new Formateur(); 
            $formateur->id=$this->params()->fromPost('id');
           $formateur->nom=$this->params()->fromPost('nom');
           $formateur->prenom= $this->params()->fromPost('prenom');
           
         $formateur->datenaiss=$this->params()->fromPost('datenaiss');
           $formateur->numtel=$this->params()->fromPost('numtel');
           $formateur->ville= $this->params()->fromPost('ville');
  
              
              $formateur->email= $this->params()->fromPost('email');
              $formateur->etud_dip= $this->params()->fromPost('etud_dip');
              $formateur->exp_stage= $this->params()->fromPost('exp_stage');
              $formateur->list_formation= $this->params()->fromPost('list_formation');
               $formateur->login= $this->params()->fromPost('login');
               $formateur->password= $this->params()->fromPost('password');
                
            $login= $this->getCentretable()->fetchlogin($login); 
              $email= $this->getCentretable()->fetchemail($email); 
            if(count($login)>0){
                $verif=1;
                
                  return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/index/inscriptionformateur?rslt=".$verif);
  
            } if(count($email)>0){ 
                $verif=2;
                return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/index/inscriptionformateur?rslt=".$verif);
                
            }
            else{
 
       try{
   $this->getFormateurtable()->saveFormateur($formateur);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
     return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/index/login");
  
    }}
       public function addparticipantAction()
    {//recuperation des variable
           
           $email= $this->params()->fromPost('email');
           $login= $this->params()->fromPost('login'); 
           
        $participant= new Participant(); 
            $participant->id=$this->params()->fromPost('id');
             $participant->cin=$this->params()->fromPost('cin');
           $participant->nom=$this->params()->fromPost('nom');
           $participant->prenom= $this->params()->fromPost('prenom');
          $participant->numtel=$this->params()->fromPost('numtel');
            $participant->email= $this->params()->fromPost('email');
           $participant->login= $this->params()->fromPost('login');
            $participant->password= $this->params()->fromPost('password');
    
              $participant->idsession= $this->params()->fromPost('idsession');
              
                $login= $this->getCentretable()->fetchlogin($login); 
              $email= $this->getCentretable()->fetchemail($email); 
            if(count($login)>0){
                $verif=1;
                
                  return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/index/inscriptionparticipant?rslt=".$verif);
  
            } if(count($email)>0){ 
                $verif=2;
                return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/index/inscriptionparticipant?rslt=".$verif);
                
            }
            else{
 
       try{
   $this->getParticipanttable()->saveParticipant($participant);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
 return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/index/login");
    }}
   
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
            
 
            
            $login= $this->getCentretable()->fetchlogin($login); 
              $email= $this->getCentretable()->fetchemail($email); 
            if(count($login)>0){
                $verif=1;
                
                  return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/index/inscriptioncentre?rslt=".$verif);
  
            } if(count($email)>0){ 
                $verif=2;
                return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/index/inscriptioncentre?rslt=".$verif);
                
            }
            else{
            
       try{
   $this->getCentretable()->saveCentre($centre);
   echo "true";
 
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
   return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/index/login");
  
    }}
}
