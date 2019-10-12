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
use Application\Model\Participation;
use Application\Model\Inscription;
use Application\Model\Question;
use Application\Model\Evenement;
use Application\Model\Evenementtable;
use Application\Model\Centre;
use Application\Model\Messageg;
use Application\Model\Document;
use Application\Model\Seance;
use Application\Model\Inscrit;
use Application\Model\Formateur;
use Application\Model\Message;
use Application\Model\Inscrittable;
use Application\Model\Repense;
use Application\Model\Repensetable;
use Application\Model\Participanttable;
 use Zend\Mvc\MvcEvent;
class ParticipantController extends AbstractActionController
{ 
     private $Seancetable;
    private $Sessiontable;
     private $Formationtable;
    private $Participanttable;
     private $authparticipant;
    private $Formateurtable;
        private $Inscriptiontable;
           private $Documenttable;
            private $messagegtable;
             private $questiontable;
                private $evenementtable;
    private $evenement;
        private $repensetable;
       private $Centretable;
        private $participationtable;
           private $Messagetable;
          private $Inscrittable;
          
                 private function getMessagetable(){
        
      if (!$this->Messagetable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Messagetable = $sm->get('Application\Model\Messagetable');
         }
       
         return $this->Messagetable;   
    }
             private function getRepensetable(){
        
      if (!$this->repensetable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->repensetable = $sm->get('Application\Model\Repensetable');
         }
       
         return $this->repensetable;   
    }
      private function getFormateurtable(){
        
      if (!$this->Formateurtable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Formateurtable = $sm->get('Application\Model\Formateurtable');
         }
         return $this->Formateurtable;
  
        
    }
          private function getParticipationtable(){
        
      if (!$this->participationtable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->participationtable = $sm->get('Application\Model\Participationtable');
         }
       
         return $this->participationtable;   
    }
             private function getCentretable(){
        
      if (!$this->Centretable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Centretable = $sm->get('Application\Model\Centretable');
         }
       
         return $this->Centretable;   
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
        
      if (!$this->evenement)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->evenementtable = $sm->get('Application\Model\Evenementtable');
         }
       
         return $this->evenementtable;   
    }
 

    private function getAuthparticipant(){
        
      if (!$this->authparticipant)  //test vide ?
       {    //initialiser usertable en post
             $sm = $this->getServiceLocator();
             $this->authparticipant = $sm->get('Authparticipant');
         }
         return $this->authparticipant;
  
        
    }
       private function getDocumenttable(){
        
      if (!$this->Documenttable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Documenttable = $sm->get('Application\Model\Documenttable');
         }
         return $this->Documenttable;
 }  
        private function getMessagegtable(){
        
      if (!$this->messagegtable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->messagegtable = $sm->get('Application\Model\messagegtable');
         }
         return $this->messagegtable;
 } 
        private function getQuestiontable(){
        
      if (!$this->questiontable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->questiontable = $sm->get('Application\Model\questiontable');
         }
         return $this->questiontable;
 } 
     
       private function getInscriptiontable(){
        
      if (!$this->Inscriptiontable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Inscriptiontable = $sm->get('Application\Model\Inscriptiontable');
         }
         return $this->Inscriptiontable;
 }   
 private function getSessiontable(){
        
      if (!$this->Sessiontable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Sessiontable = $sm->get('Application\Model\Sessiontable');
         }
         return $this->Sessiontable;
 }
  private function getSeancetable(){
        
      if (!$this->Seancetable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Seancetable = $sm->get('Application\Model\Seancetable');
         }
         return $this->Seancetable;
 }
      private function getFormationtable(){
        
      if (!$this->Formationtable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Formationtable = $sm->get('Application\Model\Formationtable');
         }
         return $this->Formationtable;
 }
        private function getParticipanttable(){
        
      if (!$this->Participanttable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->Participanttable = $sm->get('Application\Model\Participanttable');
         }
         return $this->Participanttable; }

 
         public function indexAction()
    {
        $this->layout('layout/layoutind');
        return new ViewModel();
        
        
        
    }

     public function inscriptionpAction()
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
 
 
 public function inscriptioneAction()
    {
     $this->layout('layout/layoutpar');
       //recuperation de la variable en get
                   $id_event=$this->params()->fromQuery('id_event');
  $id_par=$this->params()->fromQuery('id_par');
                $evenement= $this->getEvenementtable()->fetchid($id_event);
                       $evenement->buffer();
$current = $evenement->current();
             $participant= $this->getParticipanttable()->fetchid($id_par);
             $participant->buffer();
$current = $participant->current();
             foreach ($participant as $ide){
            foreach ($evenement as $event){
          $participation= $this->getParticipationtable()->fetchevent($ide->id,$event->id);
           $participation->buffer();
$current = $participation->current();

                 }}
              $ident=$this->getAuthparticipant()
                    ->getStorage()->read();
        


                 return new ViewModel(
                         array(
                             'evenement' => $evenement,
                                'ident' => $ident,
                             'participation' => $participation,
                             'participant' => $participant
                             
                         )

                         );
 }
 
     public function inscriptionsAction()
    {
     $this->layout('layout/layoutpar');
       //recuperation de la variable en get
                   $idp=$this->params()->fromQuery('idp');
  $id=$this->params()->fromQuery('id');
                $session= $this->getSessiontable()->fetchid($idp);
                       $session->buffer();
$current = $session->current();
             $participant= $this->getParticipanttable()->fetchid($id);
             $participant->buffer();
$current = $participant->current();
             foreach ($participant as $ide){
            foreach ($session as $ses){
          $inscription= $this->getInscriptiontable()->fetchsessionparticipant($ide->id,$ses->idp);
           $inscription->buffer();
$current = $inscription->current();

                 }}
              $ident=$this->getAuthparticipant()
                    ->getStorage()->read();
        


                 return new ViewModel(
                         array(
                             'session' => $session,
                                'ident' => $ident,
                             'inscription' => $inscription,
                             'participant' => $participant
                             
                         )

                         );
 }
 
 
 
 
 
 
     public function calandarAction()
    {
         
            $result=$this->getAuthparticipant()
                    ->getStorage()->read();
           
        //  $this->getAuthService()->clearIdentity();
           
          $this->layout('layout/layoutpar');
         
          $sessions= $this->getSessiontable()->fetchAll();
                  $id_session=$this->params()->fromQuery('id_session');
   
              
     
          
      
     
         $seance = $this->getseancetable()->fetchseancebysession($id_session);
         $seance->buffer();

$current = $seance->current();
  $sessions->buffer();

$current = $sessions->current();

   return new ViewModel(array("seance"=>$seance,"sessions"=>$sessions));
       
          
          
          
            
              
    
    }
        public function listforAction()
    {
          $this->layout('layout/layoutind');
 
         
      //appel du dao
       $sessions = $this->getSessiontable()->fetchAll();
    //affichage test
   // foreach ($users as $user){
  //  var_dump($user);}
   // exit();
        return new ViewModel(
                array(
                    'tabpropo' => $sessions
                )
                
                );
  
    }
     public function addparticipantAction()
    {//recuperation des variable
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
 
       try{
   $this->getParticipanttable()->saveParticipant($participant);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
     $view= new ViewModel();
       $view->setTerminal(true);
       
       return $view;
  
    }
          public function deleteinscriptionAction()
             {   
                    //recuperation de la variable en get
                    $id=$this->params()->fromQuery('id');

                    //suppression de la base
                $inscription= $this->getInscriptionTable()->deleteInscription($id);

                 //redirection
                 return $this
                     ->redirect()
             ->toUrl('centre');

             }
          
             
             public function addinscritAction()
    {//recuperation des variable
    
            
              $ident=$this->getAuthparticipant()
                    ->getStorage()->read();
        
        $inscrit= new Inscrit(); 
       
             $inscrit->id_session=$_GET['id_session'];
     
      
     
             
   $this->getInscrittable()->saveInscrit($inscrit); 
  
 
       
        
  
        return $this
                     ->redirect()
             ->toUrl('inscriptions?idp='.$inscrit->id_session.'&id='.$ident->id);
    
   
 
   

  
    } 

    public function addinscriptionAction()
    {//recuperation des variable
    
               $ident=$this->getAuthparticipant()
                    ->getStorage()->read();
        
            
        $inscription= new Inscription(); 
            $inscription->id=$this->params()->fromPost('id');
             $inscription->id_session=$this->params()->fromPost('id_session');
           $inscription->id_participant=$this->params()->fromPost('id_participant');
           $inscription->etat=$this->params()->fromPost('etat');
           
    
       try{
             
   $this->getInscriptiontable()->saveInscription($inscription);
  
 
       
        
   
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
     $insrcit = $this->getInscrittable()->fetchsession($inscription->id_session);
     
    if(count($insrcit)>0){
          return $this
                     ->redirect()
             ->toUrl('inscriptions?idp='.$inscription->id_session.'&id='.$ident->id);
        
    }else {
   return $this
                     ->redirect()
             ->toUrl('addinscrit?id_session='.$inscription->id_session);
  
    }}
      public function addparticipationAction()
    {//recuperation des variable
        $participation= new Participation(); 
            $participation->id=$this->params()->fromPost('id');
             $participation->id_event=$this->params()->fromPost('id_event');
           $participation->id_participant=$this->params()->fromPost('id_participant');
           $participation->etat=$this->params()->fromPost('etat');
     
           
       try{
   $this->getParticipationtable()->saveParticipation($participation);
  
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
     $view= new ViewModel();
       $view->setTerminal(true);
       
       return $view;
  
    }
       
                   public function logoutAction(){
                  $this->getAuthparticipant()->clearIdentity();
                 return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/index/login");
                 
                 
             }
             public function listeformationAction()
    {
          $centre = $_GET['id_centre'] ;
          $this->layout('layout/layoutpar');
 
           $participant=$this->getAuthparticipant()
                    ->getStorage()->read();
         
        $inscription= $this->getInscriptiontable()->fetchAll();
        $inscription->buffer();
$current = $inscription->current();
         $sessions= $this->getSessiontable()->fetchallbycentreid($centre);
    
        $formation = $this->getFormationtable()->fetchAll();
   $formation->buffer();
$current = $formation->current();
 $sessions->buffer();
$current = $sessions->current();
        return new ViewModel(
                array(
                    'tabpropo' => $sessions,
                    'participant' => $participant,
            'inscription' => $inscription,
                    'formation' => $formation
            )
                
                );
  
    }
             public function evenementAction()
    {
         
          $this->layout('layout/layoutpar');
 
           $participant=$this->getAuthparticipant()
                    ->getStorage()->read();
         
     
        
        $centre = $this->getCentretable()->fetchAll();
           $centre->buffer();
$current = $centre->current();
    
        $evenement = $this->getEvenementtable()->fetchAll();

 $evenement->buffer();
$current = $evenement->current();
        return new ViewModel(
                array(
                    'centre' => $centre,
                    'evenement' => $evenement,
            'participant' => $participant
            )
                
                );
  
    }
    
          public function onDispatch(MvcEvent $e) {
              
                if(!$this->getAuthparticipant()->hasIdentity()){
                      return $this
                              ->redirect()
                              ->toUrl('/pferihab/public/application/index/login');
            }
               parent::onDispatch($e);
               
                $participant=$this->getAuthparticipant()
                    ->getStorage()->read();
                
                 if($participant){
                  $sessions= $this->getInscriptiontable()->fetchbyparticipant($participant->id);
                   $session= $this->getSessiontable()->fetchAll();
                   $sessions->buffer();

$current = $sessions->current();
                     $session->buffer();

$current = $session->current();
                $this->layout()->setVariable("participant", $participant);
                 $this->layout()->setVariable("sessions", $sessions);
                  $this->layout()->setVariable("session", $session);
                 }
               
           }
            public function listedocumentAction()
    { 
     
       $this->layout('layout/layoutpar');
       $id_session=$this->params()->fromQuery('id_session');
        $document= $this->getDocumenttable()->fetchallbysessionid($id_session);
        
         $session= $this->getSessiontable()->fetchAll();
          $session->buffer();
$current = $session->current();

       return new  ViewModel(array(
                    'document' => $document,'session' => $session));
      
     
    }
    
    
    
    
     public function downloadAction()
    {
           $file = $_GET['file'] ;
      

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
    }
                 public function inboxAction()
    {
                        
           
      $this->layout('layout/layoutpar');
       $result=$this->getAuthparticipant()
                    ->getStorage()->read();
     $session = $_GET['id_session'] ;
  
     
     
      $message = $this->getMessagegtable()->fetchallbysessionid($session);

          
      return new ViewModel(array("session"=>$session ,"message"=>$message ));
  
     
    }
           public function discussionAction()
    {
      
       
       
        $this->layout('layout/layoutpar');
        $result=$this->getAuthParticipant()
                    ->getStorage()->read();
     $session = $_GET['id_session'] ;
  
       $question = $this->getQuestiontable()->fetchallbysessionid($session);
          $question ->buffer();
$current = $question ->current();
       
       $participant = $this->getParticipanttable()->fetchAll();
        $participant->buffer();
$current = $participant->current();
 $repense= $this->getRepensetable()->fetchAll();
     $repense->buffer();

$current =  $repense->current();
          
      return new ViewModel(array("repense"=>$repense ,"session"=>$session ,"participant"=>$participant,"question"=>$question ));
       
       
       
    }
    
      public function addquestionAction()
    {//recuperation des variable
                  $participant=$this->getAuthparticipant()
                    ->getStorage()->read();
  
              
        $question= new Question(); 
          $question->id=$this->params()->fromPost('id');
         
  
             $question->id_session=$this->params()->fromPost('id_session');
             $question->id_participant=$participant->id;
          
                 $question->question=$this->params()->fromPost('question');
                    $question->date= date("Y-m-d H:i:sP");
         
             
 
       try{
   $this->getQuestiontable()->saveQuestion($question);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
      return $this
            ->redirect()
    ->toUrl('discussion?id_session='.$question->id_session);

  
    }
      public function centreAction()
    {    $this->layout('layout/layoutpar');
       
            $result=$this->getAuthparticipant()
                    ->getStorage()->read();
            
         
       
       $centre = $this->getCentretable()->fetchAll();
                    
    $centre->buffer();

$current =  $centre->current();
 
   // exit();
        return new ViewModel(
                array(
                    'centre' => $centre,
                     
               
                )
                
                );
  
       //recuperation de la variable en get
      
            
    }
       public function listmessageAction()
    {
               $this->layout('layout/layoutpar');         
         
   $result=$this->getAuthparticipant()
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


          
      return new ViewModel(array( "message"=>$message,"centre"=>$centre ,"participant"=>$participant,"formateur"=>$formateur ));
  
     
    }
         public function updatepasswordAction()
           {
                     $this->layout('layout/layoutpar');
              //recuperation de la variable en get
                   $id=$this->params()->fromQuery('id');

               
                $edit= $this->getParticipantTable()->fetchid($id);
            // foreach ($users as $user){
           //  var_dump($user);}
            // exit();
                 return new ViewModel(
                         array(
                             'participant' => $edit 
                         )

                         );

           }
    
    
    public function updateparticipantAction()
           {
                     $this->layout('layout/layoutpar');
              //recuperation de la variable en get
                   $id=$this->params()->fromQuery('id');

               
                $edit= $this->getParticipantTable()->fetchid($id);
            // foreach ($users as $user){
           //  var_dump($user);}
            // exit();
                 return new ViewModel(
                         array(
                             'participant' => $edit 
                         )

                         );

           }
           
              public function addparticipantsAction()
    {//recuperation des variable
           
        
           
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
               
 
       try{
   $this->getParticipanttable()->saveParticipant($participant);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
 return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/participant/updateparticipant?id=".$participant->id);
    }
     public function addparticipantspAction()
    {//recuperation des variable
           
        
           
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
               
 
       try{
   $this->getParticipanttable()->saveParticipant($participant);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
 return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/participant/updatepassword?id=".$participant->id);
    }
     
    
      
}

