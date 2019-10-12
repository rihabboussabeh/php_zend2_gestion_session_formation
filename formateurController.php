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
 
use Application\Model\Formateurtable;
use Application\Model\Repense;
use Application\Model\Repensetable;
use Application\Model\Session;
use Application\Model\Participation;
use Application\Model\Evenement;
use Application\Model\Evenementtable;
use Application\Model\Centre;
use Application\Model\Document;
use Application\Model\Presence;
use Application\Model\Formateur;
use Application\Model\Question;
use Application\Model\Presencetable;
use Application\Model\Messageg;
use Application\Model\Message;
use Application\Model\Messagegtable;
use Application\Model\Inscription;
use Application\Model\Inscriptiontable;
use Application\Model\Seance;
use Application\Model\Sessiontable;
use Application\Model\Formation;
 use Zend\Mvc\MvcEvent;
use Application\Model\Formationtable;
use Application\Form\Upload;


class FormateurController extends AbstractActionController

{   private $authService;
 private $authsession;
    private $Formateurtable;
    private $Participanttable;
    private $Sessiontable;
  private $Formationtable;
      private $Seancetable;
   private $presencetable;
    private $inscriptiontable;
       private $messagegtable;
   private $Messagetable;
      private $documenttable;
       private $questiontable;
      private $Centretable;
    private $evenementtable;
    private $evenement;
      private $repensetable;
       private $participationtable;
       private $formateurtable;
       
       
       
    private function getAuthService(){
        
      if (!$this->authService)  //test vide ?
       {    //initialiser usertable en post
             $sm = $this->getServiceLocator();
             $this->authService = $sm->get('AuthService');
         }
         return $this->authService;
  
        
    }
        private function getParticipationtable(){
        
      if (!$this->participationtable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->participationtable = $sm->get('Application\Model\participationtable');
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
           private function getEvenementtable(){
        
      if (!$this->evenement)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->evenementtable = $sm->get('Application\Model\Evenementtable');
         }
       
         return $this->evenementtable;   
    }
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
          private function getQuestiontable(){
        
      if (!$this->questiontable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->questiontable = $sm->get('Application\Model\questiontable');
         }
         return $this->questiontable;
 } 
        private function getInscriptiontable(){
        
      if (!$this->inscriptiontable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->inscriptiontable = $sm->get('Application\Model\Inscriptiontable');
         }
         return $this->inscriptiontable;
 } 
        private function getDocumenttable(){
        
      if (!$this->documenttable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->documenttable = $sm->get('Application\Model\Documenttable');
         }
         return $this->documenttable;
 } 
       private function getMessagegtable(){
        
      if (!$this->messagegtable)  //test vide ?
       {    //initialiser usertable
             $sm = $this->getServiceLocator();
             $this->messagegtable = $sm->get('Application\Model\messagegtable');
         }
         return $this->messagegtable;
 } 
        private function getAuthsession(){
        
      if (!$this->authsession)  //test vide ?
       {    //initialiser usertable en post
             $sm = $this->getServiceLocator();
             $this->authsession = $sm->get('Authsession');
         }
         return $this->authsession;
  
        
    }

     private function getFormateurtable(){
        
      if (!$this->Formateurtable)  //test vide ?
       {    //initialiser usertable en post
             $sm = $this->getServiceLocator();
             $this->Formateurtable = $sm->get('Application\Model\Formateurtable');
         }
         return $this->Formateurtable;
  }
    private function getParticipanttable(){
        
      if (!$this->Participanttable)  //test vide ?
       {    //initialiser usertable en post
             $sm = $this->getServiceLocator();
             $this->Participanttable = $sm->get('Application\Model\Participanttable');
         }
         return $this->Participanttable;
  
        
    }
        private function getPresencetable(){
        
      if (!$this->presencetable)  //test vide ?
       {    //initialiser usertable en post
             $sm = $this->getServiceLocator();
             $this->Presencetable = $sm->get('Application\Model\Presencetable');
         }
         return $this->Presencetable;
  
        
    }
       private function getSeancetable(){
        
      if (!$this->Seancetable)  //test vide ?
       {    //initialiser usertable en post
             $sm = $this->getServiceLocator();
             $this->Seancetable = $sm->get('Application\Model\Seancetable');
         }
         return $this->Seancetable;
  
        
    }
         private function getSessiontable(){
        
      if (!$this->Sessiontable)  //test vide ?
       {    //initialiser usertable en post
             $sm = $this->getServiceLocator();
             $this->Sessiontable = $sm->get('Application\Model\Sessiontable');
         }
         return $this->Sessiontable;
  
        
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
        return new ViewModel();
    }
   
     public function inscriptionAction()
    {
       $this->layout('layout/layoutind');
        return new ViewModel();
    }
        public function propositionAction()
    {
               
            
       $this->layout('layout/layoutformactive');
      $user=$this->getAuthService()
                    ->getStorage()->read(); 
         
       //recuperation de la variable en get
                   $id=$this->params()->fromQuery('id');
     
               
                $edit= $this->getFormateurtable()->fetchid($id);
                $formation= $this->getFormationtable()->fetchbyformateur($user->id);
   $formation->buffer();

$current = $formation->current();

                 return new ViewModel(
                         array(
                             'noo' => $edit ,
                             'formation' => $formation
                         )

                         );
    }
           public function evenementAction()
    {
               
            
       $this->layout('layout/layoutforma');
       
       $id_formateur=$this->params()->fromQuery('id');
            $lieu=$this->params()->fromQuery('lieu');
        

                 return new ViewModel(
                         array(
                             'formateur' => $id_formateur ,
                             'lieu' =>$lieu
                            
                         )

                         );
    }
 
              
    
    
    public function uploadAction()
    {
          $this->layout('layout/layoutforma');
        return new ViewModel();
    }
      public function emploiAction()
    {
          $this->layout('layout/layoutforma');
       
 
          
        
   
         $result=$this->getAuthService()
                    ->getStorage()->read();
          $sess = $this->getSessiontable()->fetchallbyformateurid($result->id);
         
         $rdvs = $this->getSeancetable()->fetchallbyformateurid($result->id);  
 $sess->buffer();

$current = $sess->current();
         $participant = $this->getParticipanttable()->fetchAll();
          
             
   $participant->buffer();

$current = $participant->current();
$inscrit = $this->getInscriptiontable()->fetchAll();
$inscrit->buffer();

$current = $inscrit->current();
 
  

   return new ViewModel(array("rdvs"=>$rdvs ,"sess"=>$sess,"participant"=>$participant,"inscrit"=>$inscrit ));
     
          
    }
     public function addformateurAction()
    {//recuperation des variable
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
            
               $formateur->login= $this->params()->fromPost('login');
               $formateur->password= $this->params()->fromPost('password');
 
       try{
   $this->getFormateurtable()->saveFormateur($formateur);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
     $view= new ViewModel();
       $view->setTerminal(true);
       
       return $view;
  
    }
     
      public function addpropositionAction()
    {//recuperation des variable
             $result=$this->getAuthService()
                    ->getStorage()->read();
        $session= new Session(); 
          $session->idp=$this->params()->fromPost('idp');
         
           $session->langage=$this->params()->fromPost('langage');
      
           $session->datedebut=$this->params()->fromPost('datedebut');
           $session->nbh=$this->params()->fromPost('nbh');
            $session->prixh=$this->params()->fromPost('prixh');
      $session->prixs=$this->params()->fromPost('prixs');
           $session->nbg=$this->params()->fromPost('nbg');
         $session->idformateur=$result->id;
            $session->etat=$this->params()->fromPost('etat');
                $session->id_centre=($this->params()->fromPost('id_centre'));
           
                
 
       try{
   $this->getSessiontable()->saveSession($session);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
        return $this
            ->redirect()
    ->toUrl('centre');
  
    }
 
    public function addevenementAction()
    {//recuperation des variable
        $evenement= new Evenement(); 
          $evenement->id=$this->params()->fromPost('id');
         
           $evenement->titre=$this->params()->fromPost('titre');
            $evenement->date=$this->params()->fromPost('date');
           $evenement->description=$this->params()->fromPost('description');
           $evenement->lieu=$this->params()->fromPost('lieu');
           $evenement->id_formateur=$this->params()->fromPost('id_formateur');
            $evenement->etat=$this->params()->fromPost('etat');
      
           
                
 
       try{
   $this->getEvenementtable()->saveEvenement($evenement);
  
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
      return $this
            ->redirect()
    ->toUrl('centre');
    }
       
  
    
      public function listeformationAction()
    {   
 
            $result=$this->getAuthService()
                    ->getStorage()->read();
 
               $this->layout('layout/layoutformactive');
     
         
       //recuperation de la variable en get
            $formation = $this->getFormationtable()->fetchbyformateur($result->id) ;
              
   $formation->buffer();

$current = $formation->current();
        return new ViewModel(
                array(
                
           
                    'tabfor' => $formation
                , 'forma' => $result
            )
                
                );
            
    }
   
   
    
                
           
      
     
            
            
       
 
       
    
     public function onDispatch(MvcEvent $e) {
              
                if(!$this->getAuthService()->hasIdentity()){
                      return $this
                              ->redirect()
                              ->toUrl('/pferihab/public/application/index/login');
            }
               parent::onDispatch($e);
                   $formateur=$this->getAuthService()
                    ->getStorage()->read();
                $this->layout()->setVariable("formateur", $formateur);
           } 
        public function logoutAction(){
                 $this->getAuthService()->clearIdentity();
                 return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/index/login");
                 
                 
             }
             
    
    
      public function addpresenceAction()
    {//recuperation des variable
          $inscription = $this->getInscriptiontable()->fetchAll();
          $session=$this->params()->fromPost('id_session');
        
             $inscription = $this->getInscriptiontable()->fetchallbysessionid($session);
          
             
             foreach($inscription as $ins){
            
         
        $presence= new Presence(); 
          $presence->id=$this->params()->fromPost('id');
         
           $presence->id_seance=$this->params()->fromPost('id_seance');
          
            $presence->id_participant= $ins->id_participant;
        $presence->etat=$this->params()->fromPost('etat'.$ins->id_participant);
      
     
 try{
   $this->getPresencetable()->savePresence($presence);
  
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
  
   }
 
      return $this
            ->redirect()
    ->toUrl('emploi');
  
    }
    
         public function addseanceAction()
    {//recuperation des variable
              $result=$this->getAuthService()
                    ->getStorage()->read();
              
        $seance= new Seance(); 
          $seance->id=$this->params()->fromPost('id');
         
           $seance->dateseance=$this->params()->fromPost('dateseance');
            $seance->id_session=$this->params()->fromPost('id_session');
          $seance->id_formateur=$result->id;
           $seance->etat='desactiver';
         
             
 
       try{
   $this->getSeancetable()->saveSeance($seance);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
     $view= new ViewModel();
       $view->setTerminal(true);
       
       return $view;
  
    }
          public function addmessagegAction()
    {//recuperation des variable
              $result=$this->getAuthService()
                    ->getStorage()->read();
 
              
        $messageg= new Messageg(); 
          $messageg->id=$this->params()->fromPost('id');
         
  
             $messageg->id_session=$this->params()->fromPost('idp');
          $messageg->id_formateur=$result->id;
         
              $messageg->objet=$this->params()->fromPost('objet');
                 $messageg->message=$this->params()->fromPost('message');
                    $messageg->datemessage= date("Y-m-d");
         
             
 
       try{
   $this->getMessagegtable()->saveMessageg($messageg);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
    return $this
            ->redirect()
    ->toUrl('inbox?id_session='.$messageg->id_session);

  
    }
                public function presenceAction()
  { 
        $this->layout('layout/layoutforma');
        $idp=$this->params()->fromQuery('idp'); //id session
  $id=$this->params()->fromQuery('id'); //id seance
  $session= $this->getSessiontable()->fetchid($idp);
     $seance = $this->getSeancetable()->fetchid($id);
         $result=$this->getAuthService()
                    ->getStorage()->read();

     $inscription = $this->getInscriptiontable()->fetchAll();
      $presence = $this->getPresencetable()->fetchAll();
          $participant = $this->getParticipanttable()->fetchAll();     
                $participant->buffer();
$current = $participant->current();
$inscription->buffer();
$current = $inscription->current();             
   $session->buffer();
$current = $session->current();
 $presence->buffer();
$current = $presence->current();
 $seance->buffer();
$current = $seance->current();
  
  
   return new ViewModel(array("presence"=>$presence ,"session"=>$session , "participant"=>$participant ,"seance"=>$seance ,"inscription"=>$inscription));
    }
    
    
     public function documentAction()
    { 
       $idp=$_GET['id_session'];
       $document= $this->getDocumenttable()->fetchallbysessionid($idp);
       $view= new ViewModel(array("idp"=>$idp,"document"=>$document));
       $view->setTerminal(true);
       return $view;
      
     
    }
        public function addocumentAction()
    {   $id_session= $this->params()->fromPost('idp');
    
             $rsl=0;
            if (!file_exists('C:/wamp/www/Pferihab/data/session'.$id_session)) {
                         mkdir('C:/wamp/www/Pferihab/data/session'.$id_session, 0777, true); 


            }
            $target_dir = "./data/session".$id_session."/";
            

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$name = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    if (file_exists($target_file)) {
    var_dump('sorry, file already exists.');
    $uploadOk = 0;
      $rsl=1;
}   
// Check file size
 
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "rar"&& $imageFileType != "docx" ) {
    var_dump('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
  
    $uploadOk = 0;
   $rsl=2;
} 
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
   $rsl=3; 
}
 
}


if ($uploadOk == 0) {
   var_dump('Sorry, your file was not uploaded.');
    $result=4;
  // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $result=5;
    } else {
        var_dump('Sorry, there was an error uploading your file');
        $result=6;
    }
}
if(($result)==5){
 $id_session= $this->params()->fromPost('idp');
      $document= new Document(); 
            $document->libelle=$name;
          $document->id_session=$id_session;
          $document->code= $this->params()->fromPost('code');
          $document->etat= ('desactiver');
        
 
       try{
   $this->getDocumenttable()->saveDocument($document);
  
   
 }
    catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
}
    
return $this
            ->redirect()
    ->toUrl('document?rslt='.$result.'&rsl='.$rsl.'&id_session='.$id_session);

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
              public function listevenementAction()
    {
          
        $this->layout('layout/layoutforma');
       
  
         $result=$this->getAuthService()
                    ->getStorage()->read();
       
          

      
                   $evenement= $this->getEvenementtable()->fetchformateurid($result->id);
                   
  
                 

   return new ViewModel(array("evenement"=>$evenement));
       
          
          
          
              } 
    
           public function listsessionAction()
    {
          
        $this->layout('layout/layoutforma');
       
  
         $result=$this->getAuthService()
                    ->getStorage()->read();
         $sessions = $this->getSessiontable()->fetchallbyformateurid($result->id);
          

      
                   $session= $this->getSessiontable()->fetchAll();
                   $sessions->buffer();

 
                 $this->layout()->setVariable("sessions", $sessions);
                  $this->layout()->setVariable("session", $session);
                 

   return new ViewModel(array("sessions"=>$sessions));
       
          
          
          
              } 
                    public function inboxAction()
    {
                        
           
      $this->layout('layout/layoutforma');
       $result=$this->getAuthService()
                    ->getStorage()->read();
     $session = $_GET['id_session'] ;
  
     
     
        $message = $this->getMessagegtable()->fetchallbysessionid($session);

          
      return new ViewModel(array("session"=>$session ,"formateur"=>$result,"message"=>$message ));
  
     
    }
       public function messageAction()
    {
          
            $recepteur=$_GET['idrecepteur'];
  
        $this->layout('layout/layoutforma');
       $user=$this->getAuthService()
                    ->getStorage()->read(); 
  
  
     
     
        $message = $this->getMessagetable()->fetchmessage($user->id.'f',$recepteur.'c');
        
  $centre = $this->getCentretable()->fetchid($recepteur);
   $centre->buffer();
$current = $centre->current();
          
      return new ViewModel(array( "centre"=>$centre,"user"=>$user,"message"=>$message ,"recepteur"=>$recepteur  ));
           
    
  
     
     
    }
        
      public function discussionAction()
    {
      
       
       
        $this->layout('layout/layoutforma');
          $result=$this->getAuthService()
                    ->getStorage()->read();
          
     $session = $_GET['id_session'] ;
  
       $question = $this->getQuestiontable()->fetchallbysessionid($session);
       $question->buffer();

$current = $question->current();
   $participant= $this->getParticipanttable()->fetchAll();
     $participant->buffer();

$current =  $participant->current();

  $repense= $this->getRepensetable()->fetchAll();
     $repense->buffer();

$current =  $repense->current();
          
 
          

      return new ViewModel(array("repense"=>$repense ,"participant"=>$participant ,"session"=>$session ,"question"=>$question ));
       
       
       
    }
       public function centreAction()
    {
       
            $result=$this->getAuthService()
                    ->getStorage()->read();
            
               $session = $this->getSessiontable()->fetchAll();
               
       
                   $actif = false;
               foreach($session as $sess){
                 
              
        if(($sess->idformateur)==($result->id))
        {
                    if(($sess->etat)=='activer'){
                 $actif = true;
                    }
        }
 
   }
    if(!$actif) {
               $this->layout('layout/layoutformactive');
     
         
                //appel du dao
       $centre = $this->getCentretable()->fetchAll();
                    
    $centre->buffer();

$current =  $centre->current();
    $formation = $this->getFormationtable()->fetchAll();
               
   $formation->buffer();

$current = $formation->current();
    //affichage test
   // foreach ($users as $user){
  //  var_dump($user);}
   // exit();
        return new ViewModel(
                array(
                    'centre' => $centre,
                     'formation' => $formation,
                    'result' => $result
                )
                
                );
  
       //recuperation de la variable en get
      
            
    }
   
   
   if($actif) {
       
             $this->layout('layout/layoutforma');
     
         
 $centre = $this->getCentretable()->fetchAll();
                    
    $centre->buffer();

$current =  $centre->current();
    $formation = $this->getFormationtable()->fetchAll();
               
   $formation->buffer();

$current = $formation->current();
    //affichage test
   // foreach ($users as $user){
  //  var_dump($user);}
   // exit();
        return new ViewModel(
                array(
                     'centre' => $centre,
                     'formation' => $formation,
                    'result' => $result
                )
                
                );
  
   }
   
   else{
        if(($sess->etat)=='desactiver'){
                 $this->layout('layout/layoutformactive');
     
         
       $centre = $this->getCentretable()->fetchAll();
                    
    $centre->buffer();

$current =  $centre->current();
    $formation = $this->getFormationtable()->fetchAll();
               
   $formation->buffer();

$current = $formation->current();
    //affichage test
   // foreach ($users as $user){
  //  var_dump($user);}
   // exit();
        return new ViewModel(
                array(
                     'centre' => $centre,
                     'formation' => $formation,
                    'result' => $result
                )
                );
  
            
            
            
        }
   }
       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    }
    
   public function addrepenseAction()
    {//recuperation des variable
                  $formateur=$this->getAuthService()
                    ->getStorage()->read();
  
                $session=$this->params()->fromPost('id_session');
                
                
        $repense= new Repense(); 
        
          $repense->id=$this->params()->fromPost('id');
         
   
             $repense->id_question=$this->params()->fromPost('id_question');
           
          
                 $repense->repense=$this->params()->fromPost('repense');
                   $repense->id_formateur=$formateur->id;
                    $repense->date= date("Y-m-d H:i:sP");
         
             
 
       try{
   $this->getRepensetable()->saveRepense($repense);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
      return $this
            ->redirect()
    ->toUrl('discussion?id_session='.$session);

  
    }
         public function editdocAction()
    {   
           //recuperation de la variable en get
           $id=$this->params()->fromQuery('id');
       $id_session=$this->params()->fromQuery('id_session');
           $document = $this->getDocumenttable()->getDocument($id);

          if($document->etat = "activer")
          {
                $document->etat = "desactiver";}
              
       
       $this->getDocumenttable()->saveDocument($document);
        
        //redirection
        return $this
            ->redirect()
     ->toUrl('document?id_session='.$id_session);
        
    }
      public function editdoccAction()
    {   
           //recuperation de la variable en get
           $id=$this->params()->fromQuery('id');
       $id_session=$this->params()->fromQuery('id_session');
           $document = $this->getDocumenttable()->getDocument($id);

          if($document->etat = "desactiver")
          {
                $document->etat = "activer";}
              
       
       $this->getDocumenttable()->saveDocument($document);
        
        //redirection
        return $this
            ->redirect()
     ->toUrl('document?id_session='.$id_session);
        
    }
    
         public function listmessageAction()
    {
                        
         
  
       $user=$this->getAuthService()
                    ->getStorage()->read();
     $this->layout('layout/layoutforma');
  
     
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


          
      return new ViewModel(array( "user"=>$user, "message"=>$message,"centre"=>$centre ,"participant"=>$participant,"formateur"=>$formateur ));
  
     
    }
    public function addmessageAction()
    {//recuperation des variable
                  $user=$this->getAuthService()
                    ->getStorage()->read(); 
  $recepteur=$this->params()->fromPost('idr');
              
        $message= new Message(); 
          $message->id=$this->params()->fromPost('id');
         
  
             $message->emetteur=$this->params()->fromPost('ide').('f');
          $message->recepteur=$this->params()->fromPost('idr').('c');
         
           
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
    
        public function formcentreAction()
      {
             $this->layout('layout/layoutforma');
              //recuperation de la variable en get
                   $id=$this->params()->fromQuery('id');

               
                $form= $this->getCentretable()->fetchid($id);
            // foreach ($users as $user){
           //  var_dump($user);}
            // exit();
                 return new ViewModel(
                         array(
                             'noo' => $form
                         )

                         );

           }
             public function listeparticipantAction()
    {
          
                            
                      
    $this->layout('layout/layoutforma');
   
             
         
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
        
                 

   return new ViewModel(array( "sessions"=>$sessions,"session"=>$session,"inscription"=>$inscription,"participant"=>$participant));
       
          
          
          
              }
        public function listeparticipantevenementAction()
    {
          
                            
                      
    $this->layout('layout/layoutforma');
   
             
         
          $id_evenement=$this->params()->fromQuery('id_evenement');
            $participation = $this->getParticipationtable()->fetchevenementid($id_evenement);
      
          
          $participant= $this->getParticipanttable()->fetchAll();
   
  $participant->buffer();
$current = $participant->current();
   $participation->buffer();
$current = $participation->current();

        $participations= $this->getParticipationtable()->fetchAll();
                   $evenement= $this->getEvenementtable()->fetchAll();
                   $participation->buffer();

$current = $participation->current();
                     $evenement->buffer();
$current = $evenement->current();
        
                 

   return new ViewModel(array( "participations"=>$participations,"evenement"=>$evenement,"participation"=>$participation,"participant"=>$participant));
       
          
          
          
              }
               public function updatepasswordAction()
           {
                     $this->layout('layout/layoutforma');
              //recuperation de la variable en get
                   $id=$this->params()->fromQuery('id');

               
                $edit= $this->getFormateurTable()->fetchid($id);
            // foreach ($users as $user){
           //  var_dump($user);}
            // exit();
                 return new ViewModel(
                         array(
                             'formateur' => $edit 
                         )

                         );

           }
               public function updateformateurAction()
           {
                     $this->layout('layout/layoutforma');
              //recuperation de la variable en get
                   $id=$this->params()->fromQuery('id');

               
                $edit= $this->getFormateurTable()->fetchid($id);
            // foreach ($users as $user){
           //  var_dump($user);}
            // exit();
                 return new ViewModel(
                         array(
                             'formateur' => $edit 
                         )

                         );

           }
            public function addformateursAction()
    {//recuperation des variable
          
           
           
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
                
          
 
       try{
   $this->getFormateurtable()->saveFormateur($formateur);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
     return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/formateur/updateformateur?id=".$formateur->id);
  
    }
      public function addformateurspAction()
    {//recuperation des variable
          
           
           
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
                
          
 
       try{
   $this->getFormateurtable()->saveFormateur($formateur);
   echo "true";
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
     return $this
                         ->redirect()
                         ->toUrl("/pferihab/public/application/formateur/updatepassword?id=".$formateur->id);
  
    }
       public function formationAction()
    {   $this->layout('layout/layoutformactive');
       
        return new ViewModel();
    }       
    
    public function addformationAction()
    {//recuperation des variable
        $user=$this->getAuthService()
                    ->getStorage()->read(); 
        
        $formation= new Formation(); 
          $formation->id=$this->params()->fromPost('id');
         
           $formation->langage=$this->params()->fromPost('langage');
            $formation->objectif=$this->params()->fromPost('objectif');
           $formation->prequis=$this->params()->fromPost('prequis');
           $formation->idformateur= $user->id;
  
  
                
 
       try{
   $this->getFormationtable()->saveFormation($formation);
  
    }catch(\Exeception $ex){
        echo $ex->getMessage();
    
    }
      return $this
            ->redirect()
    ->toUrl('listeformation');
    }
      
    
    
            
    
    
     
}